<?php

return [

    /*
     * Specify connection for judge system
     */
    'baseurl' => env('JUDGE_BASEURL', 'http://localhost:3000/'),
    'submiturl' => env('JUDGE_SUBMIT_URL', 'submit'),
    'descurl' => env('JUDGE_DESC_URL', 'getDesc')

];