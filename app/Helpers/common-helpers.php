<?php

function responseFunction ($data) {

    if (!$data) {
        return response([
            'success' => true,
            'message' => 'DATA NOT FOUND!!!'
        ]);
    } 

    return response([
        'success' => true,
        'message' => 'DATA FOUND!!!',
        'data' => $data
    ]);
}