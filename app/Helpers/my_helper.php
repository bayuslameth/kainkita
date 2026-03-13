<?php

function isChecked($status)
{
    return ($status) ? "checked" : "";
}

function isLabelChecked($label)
{
    return ($label) ? "Aktif" : "Nonaktif";
}

function isLabelAvailable($label)
{
    return ($label) ? "Available" : "Not Available";
}

function getAmount($money)
{
    $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
    $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

    $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

    $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
    $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

    return (float) str_replace(',', '.', $removedThousandSeparator);
}

function encrypt_id($id)
{
    $security       = parse_ini_file("security.ini");

    $key    = hash('sha256', $security['encryption_key'], true); // 32 bytes
    $iv     = substr(hash('sha256', $security['iv'], true), 0, 16); // 16 bytes
    $method = $security['encryption_mechanism'] ?? 'AES-256-CBC';

    $encrypted = openssl_encrypt($id, $method, $key, 0, $iv);

    // URL-safe base64 supaya aman di route / link
    return strtr(base64_encode($encrypted), '+/=', '-_,');
}

function decrypt_id($encryptedId)
{
    $security       = parse_ini_file("security.ini");

    $key    = hash('sha256', $security['encryption_key'], true);
    $iv     = substr(hash('sha256', $security['iv'], true), 0, 16);
    $method = $security['encryption_mechanism'] ?? 'AES-256-CBC';

    // balikkan URL-safe base64 ke normal base64
    $data = base64_decode(strtr($encryptedId, '-_,', '+/='));

    return openssl_decrypt($data, $method, $key, 0, $iv);
}

function encrypt_url($string)
{

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);

    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}

function decrypt_url($string)
{

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */

    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);

    //do the decryption given text/string/number

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function createSlug($text)
{
    $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);

    $text = str_replace(' ', '-', $text);

    $text = strtolower($text);

    return $text;
}

function slugify($text, string $divider = '-')
{
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, $divider);

    $text = preg_replace('~-+~', $divider, $text);

    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function getTipe($tipe)
{
    if ($tipe == 1) {
        $tipe = 'Kiloan';
        $tipes = 'kg';
    } elseif ($tipe == 2) {
        $tipe = 'Satuan';
        $tipes = 'pcs';
    } elseif ($tipe == 2) {
        $tipe = 'Meteran';
        $tipes = 'm';
    }

    $array = [
        'tipe'   => $tipe,
        'tipe2'  => $tipes
    ];

    return $array;
}

function dateToIndo($date)
{
    if (!$date || $date === '0000-00-00') {
        return '-';
    }

    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    $exp = explode('-', $date);
    if (count($exp) !== 3) {
        return $date;
    }

    return (int) $exp[2] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[0];
}

function dateTimeToIndo($datetime)
{
    if (!$datetime || $datetime === '0000-00-00 00:00:00') {
        return '-';
    }

    $dt = date_create($datetime);
    if (!$dt) {
        return $datetime;
    }

    $hari = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];

    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    return
        $hari[(int) $dt->format('w')] . ', ' .
        (int) $dt->format('d') . ' ' .
        $bulan[(int) $dt->format('m')] . ' ' .
        $dt->format('Y') . ' ' .
        $dt->format('H:i');
}

function filterDateRange($builder, $date_range, $column = 'date')
{
    if (empty($date_range)) {
        return;
    }

    // Normalisasi separator (handle " to ", "+to+", " - ", dll)
    $normalized = str_replace([' to ', '+to+', ' To ', ' TO '], ' - ', trim($date_range));

    $dates = explode(' - ', $normalized);

    if (count($dates) !== 2) {
        log_message('debug', "Range tanggal invalid (bukan 2 bagian): '$date_range'");
        return;
    }

    $start_str = trim($dates[0]);
    $end_str   = trim($dates[1]);

    // Pastikan pakai DateTime global
    $start = \DateTime::createFromFormat('d-m-Y', $start_str);
    $end   = \DateTime::createFromFormat('d-m-Y', $end_str);

    if ($start === false || $end === false) {
        log_message('error', "Gagal parse tanggal: '$date_range' → start='$start_str' end='$end_str'");
        return;
    }

    if ($start > $end) {
        log_message('debug', "Start date lebih besar dari end date: '$date_range'");
        return;
    }

    $start_date = $start->format('Y-m-d');
    $end_date   = $end->format('Y-m-d');

    $builder->where("$column >=", $start_date);
    $builder->where("$column <=", $end_date . ' 23:59:59');

    log_message('debug', "Filter tanggal diterapkan: $start_date s/d $end_date (dari '$date_range')");
}

function getInitial($name)
{
    $words = explode(' ', trim($name));

    if (count($words) >= 2) {
        return strtoupper(
            mb_substr($words[0], 0, 1) .
                mb_substr($words[1], 0, 1)
        );
    }

    return strtoupper(mb_substr($name, 0, 2));
}