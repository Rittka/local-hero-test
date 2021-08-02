<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\PostalCodeConflictValidator;

class TestController extends Controller
{   public $data = [];
    public function index(){


        return view('index') ;

    }

    public function getData()
    {
        $items = [   [    "Hotel" => rand(0,999) ,

                                            "Gym" => rand(0,999) ,
                                            "Artz" => rand(0,999) ,
                                            "Restaurant" => rand(0,999) ,
                                            "Hospital" => rand(0,999) ,
                                            "School" => rand(0,999) ,
                                        ],
                                  [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                    [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                  [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                     [        "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                   [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                      [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],
                                  [    "Hotel" => rand(0,999) ,
                                        "Gym" => rand(0,999) ,
                                        "Artz" => rand(0,999) ,
                                        "Restaurant" => rand(0,999) ,
                                        "Hospital" => rand(0,999) ,
                                        "School" => rand(0,999) ,
                                    ],



                ];

        return response()->json($items);
    }
    public function validator(Request $request){


        $obj = new PostalCodeConflictValidator($request->old_codes ,$request->new_codes);

        $resault = $obj->validate();

        return response()->json($resault);

    }
}
