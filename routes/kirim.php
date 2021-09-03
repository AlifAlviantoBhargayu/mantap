<?php
Route::post('/kirim',function () {

    header('Content-Type: application/json');
    $message = '';
    $status = '';
    $data = array(
        'api' => 'APIKEY KAMU',
        'email' => 'EMAIL KAMU',
        'number' => 'NOMER TUJUAN',
        'message' => 'PESAN YANG DIKIRIM'
    );

    $payload = json_encode($data);
    $ch = curl_init('https://api.adisutomo.my.id/post');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    curl_close($ch);

    $Olahdata = json_decode($result, true);

    if ($Olahdata['hasil']['status'] == false) {
        $message = 'The number is not registered on WhatsApp.';
        $status = $Olahdata['hasil']['status'];
    } else {
        $message = 'ok';
        $status = true;
    }

    $DataDetail = array(
        'Hasil' => array(
            'message' => $message,
            'Status' => $status
        )
    );
    echo json_encode($DataDetail, JSON_PRETTY_PRINT);


});