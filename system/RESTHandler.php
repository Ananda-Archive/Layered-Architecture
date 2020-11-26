<?php

abstract class RESTHandler {

    // JSON MESSAGE
    const REQUEST_SUCCESS_MESSAGE = 'Request Berhasil';
    const REQUEST_FAILED_MESSAGE = 'Request Gagal';

    // HTTP STATUS CODE
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    
    public function response ($data = NULL, $status = NULL, $message = NULL) {
        $response = array();
        $response['status'] = $status;
        $response['message'] = $message;
        $response['data'] = $data;

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}