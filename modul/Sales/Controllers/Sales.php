<?php

namespace Modul\Sales\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;

class Sales extends BaseController
{
    public function index()
    {
        $data = [
            'menu'    => 'transactions',
            'submenu' => 'sales',
            'title'   => 'Data Penjualan',
        ];

        return view('Modul\Sales\Views\viewSales', $data);
    }

    public function datatable()
    {
        $builder = $this->db->table('sales')
            ->select('
                sales.id,
                sales.invoice_number,
                sales.customer_id,
                sales.total_price,
                sales.shipping_cost,
                sales.grand_total,
                sales.payment_method,
                sales.status_pembayaran,
                sales.status_pesanan,
                sales.kurir,
                sales.resi_pengiriman,
                sales.created_at,
                customers.full_name,
                customers.phone_number
            ')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->orderBy('sales.id', 'DESC');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->setSearchableColumns([
                'LOWER(sales.invoice_number)',
                'LOWER(customers.full_name)',
                'customers.phone_number',
                'LOWER(sales.payment_method)',
                'LOWER(sales.status_pembayaran)',
                'LOWER(sales.status_pesanan)',
                'LOWER(sales.kurir)',
            ])
            ->add('customer_name', function ($row) {
                $name  = !empty($row->full_name) ? $row->full_name : 'Customer';
                $phone = !empty($row->phone_number) ? $row->phone_number : '-';

                return '<div>
                            <div class="fw-semibold">' . esc($name) . '</div>
                            <small class="text-muted">' . esc($phone) . '</small>
                        </div>';
            })
            ->add('invoice', function ($row) {
                return '<span class="fw-semibold">' . esc($row->invoice_number) . '</span>';
            })
            ->add('tanggal', function ($row) {
                return date('d/m/Y H:i', strtotime($row->created_at));
            })
            ->add('grand_total_rp', function ($row) {
                return '<span class="fw-semibold">' . $this->formatRupiah($row->grand_total) . '</span>';
            })
            ->add('payment_method_label', function ($row) {
                return $this->paymentMethodLabel($row->payment_method);
            })
            ->add('status_pembayaran_label', function ($row) {
                return $this->statusPembayaranBadge($row->status_pembayaran);
            })
            ->add('status_pesanan_label', function ($row) {
                return $this->statusPesananBadge($row->status_pesanan);
            })
            ->add('action', function ($row) {
                return '<button type="button" class="btn btn-light btn-sm" title="Detail Penjualan" onclick="detail(' . $row->id . ')">
                            <i class="fas fa-eye"></i>
                        </button>';
            })
            ->toJson(true);
    }

    public function getdetail()
    {
        $id = $this->request->getPost('id');

        $sales = $this->db->table('sales')
            ->select('
                sales.*,
                customers.full_name,
                customers.phone_number,
                customers.address,
                customers.postal_code
            ')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->where('sales.id', $id)
            ->get()
            ->getRowArray();

        if (!$sales) {
            $respond = [
                'status'  => false,
                'message' => 'Data penjualan tidak ditemukan.',
            ];

            echo json_encode($respond);
            return;
        }

        $details = $this->db->table('sales_detail')
            ->select('
                sales_detail.id,
                sales_detail.sales_id,
                sales_detail.product_id,
                sales_detail.product_name,
                sales_detail.qty,
                sales_detail.price,
                sales_detail.subtotal,
                sales_detail.created_at,
                products.umkm_name,
                products.region,
                products_images.image_path
            ')
            ->join('products', 'products.id = sales_detail.product_id', 'left')
            ->join('products_images', 'products_images.product_id = sales_detail.product_id AND products_images.is_primary = 1', 'left')
            ->where('sales_detail.sales_id', $id)
            ->get()
            ->getResultArray();

        $html = $this->detailHtml($sales, $details);

        $respond = [
            'status' => true,
            'data'   => $sales,
            'detail' => $details,
            'html'   => $html,
        ];

        echo json_encode($respond);
    }

    private function detailHtml($sales, $details)
    {
        $html = '
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Invoice</div>
                        <div class="fw-semibold">' . esc($sales['invoice_number']) . '</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Tanggal Order</div>
                        <div class="fw-semibold">' . date('d/m/Y H:i', strtotime($sales['created_at'])) . '</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Customer</div>
                        <div class="fw-semibold">' . esc($sales['full_name'] ?? '-') . '</div>
                        <div class="text-muted fs-13">' . esc($sales['phone_number'] ?? '-') . '</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Status</div>
                        <div class="mb-1">' . $this->statusPembayaranBadge($sales['status_pembayaran']) . '</div>
                        <div>' . $this->statusPesananBadge($sales['status_pesanan']) . '</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Metode Pembayaran</div>
                        <div class="fw-semibold">' . $this->paymentMethodText($sales['payment_method']) . '</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded p-3 h-100">
                        <div class="text-muted fs-13 mb-1">Kurir / Resi</div>
                        <div class="fw-semibold text-uppercase">' . esc($sales['kurir'] ?? '-') . '</div>
                        <div class="text-muted fs-13">' . esc($sales['resi_pengiriman'] ?? 'Belum ada resi') . '</div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="border rounded p-3">
                        <div class="text-muted fs-13 mb-1">Alamat Pengiriman</div>
                        <div>' . nl2br(esc($sales['alamat_pengiriman'])) . '</div>
                    </div>
                </div>
            </div>
        ';

        $html .= '
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">Gambar</th>
                            <th>Produk</th>
                            <th class="text-center" style="width: 80px;">Qty</th>
                            <th class="text-end" style="width: 130px;">Harga</th>
                            <th class="text-end" style="width: 140px;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
        ';

        if (!empty($details)) {
            foreach ($details as $item) {
                $image = $this->productImage($item['image_path'] ?? '');

                $html .= '
                    <tr>
                        <td>
                            <div class="bg-light rounded p-1" style="width: 58px; height: 58px;">
                                <img src="' . $image . '" alt="' . esc($item['product_name']) . '" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold">' . esc($item['product_name']) . '</div>
                            <div class="text-muted fs-13">
                                ' . esc($item['umkm_name'] ?? 'Produk Lokal') . '
                                ' . (!empty($item['region']) ? ' • ' . esc($item['region']) : '') . '
                            </div>
                        </td>
                        <td class="text-center">' . esc($item['qty']) . '</td>
                        <td class="text-end">' . $this->formatRupiah($item['price']) . '</td>
                        <td class="text-end fw-semibold">' . $this->formatRupiah($item['subtotal']) . '</td>
                    </tr>
                ';
            }
        } else {
            $html .= '
                <tr>
                    <td colspan="5" class="text-center text-muted">Detail produk tidak ditemukan.</td>
                </tr>
            ';
        }

        $html .= '
                    </tbody>
                </table>
            </div>
        ';

        $html .= '
            <div class="row justify-content-end mt-4">
                <div class="col-md-5">
                    <div class="border rounded p-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">' . $this->formatRupiah($sales['total_price']) . '</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Ongkir</span>
                            <span class="fw-semibold">' . $this->formatRupiah($sales['shipping_cost']) . '</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Grand Total</span>
                            <span class="fw-bold text-primary">' . $this->formatRupiah($sales['grand_total']) . '</span>
                        </div>
                    </div>
                </div>
            </div>
        ';

        if (!empty($sales['catatan'])) {
            $html .= '
                <div class="alert alert-light border mt-4 mb-0">
                    <div class="fw-semibold mb-1">Catatan</div>
                    <div>' . nl2br(esc($sales['catatan'])) . '</div>
                </div>
            ';
        }

        return $html;
    }

    private function formatRupiah($value)
    {
        return 'Rp ' . number_format((float) $value, 0, ',', '.');
    }

    private function productImage($imagePath)
    {
        return !empty($imagePath)
            ? base_url(ltrim($imagePath, '/'))
            : base_url('assets/images/no-image.png');
    }

    private function paymentMethodText($method)
    {
        if ($method == 'transfer') {
            return 'Transfer Bank';
        }

        if ($method == 'cod') {
            return 'COD';
        }

        if ($method == 'midtrans') {
            return 'Midtrans';
        }

        return ucfirst((string) $method);
    }

    private function paymentMethodLabel($method)
    {
        $text = $this->paymentMethodText($method);

        if ($method == 'transfer') {
            return '<span class="badge bg-primary-subtle text-primary">' . esc($text) . '</span>';
        }

        if ($method == 'cod') {
            return '<span class="badge bg-warning-subtle text-warning">' . esc($text) . '</span>';
        }

        if ($method == 'midtrans') {
            return '<span class="badge bg-info-subtle text-info">' . esc($text) . '</span>';
        }

        return '<span class="badge bg-secondary-subtle text-secondary">' . esc($text) . '</span>';
    }

    private function statusPembayaranBadge($status)
    {
        if ($status == 'paid') {
            return '<span class="badge bg-success-subtle text-success">Paid</span>';
        }

        if ($status == 'failed') {
            return '<span class="badge bg-danger-subtle text-danger">Failed</span>';
        }

        if ($status == 'expired') {
            return '<span class="badge bg-dark-subtle text-dark">Expired</span>';
        }

        return '<span class="badge bg-warning-subtle text-warning">Pending Payment</span>';
    }

    private function statusPesananBadge($status)
    {
        if ($status == 'processing') {
            return '<span class="badge bg-primary-subtle text-primary">Processing</span>';
        }

        if ($status == 'shipped') {
            return '<span class="badge bg-info-subtle text-info">Shipped</span>';
        }

        if ($status == 'delivered') {
            return '<span class="badge bg-success-subtle text-success">Delivered</span>';
        }

        if ($status == 'cancelled') {
            return '<span class="badge bg-danger-subtle text-danger">Cancelled</span>';
        }

        return '<span class="badge bg-secondary-subtle text-secondary">Pending Order</span>';
    }
}