<?php

namespace App\Classes;

Class PostalCodeConflictValidator{
    public $new_codes ;
    public $old_codes ;
    public function __construct($old_codes , $new_codes) {
        $this->old_codes = $old_codes ;
        $this->new_codes = $new_codes ;
    }

    public function validate(){

        $conflict_codes = array();



        //for each new code , first find if the code has a star then search
        foreach ($this->new_codes as $key => $new_code) {
            $star_position = strpos($new_code , '*');

            // if new code hasn't star
            if($star_position === false){
                //for each sales guy , get it's sales area
                foreach($this->old_codes[0] as $key => $codes){


                    // for each sales area (postal code), find if containe a star
                    foreach($codes as $code){

                        $star_pos = strpos($code , '*');

                        // if the code hasn't star compare it with the new code and if code matches with new the new code
                        if($star_pos === false){
                            if($code == $new_code){
                                array_push($conflict_codes , $code);

                            }
                        }else{
                            //if code 57*, star_pos = 2 , mini_code = 57 ,
                            $mini_code = str_split($code , $star_pos);

                            // if new_code start with the mini_code push it to the conflict array
                            if(str_starts_with($new_code, $mini_code[0] )){
                                array_push($conflict_codes , $code);
                            }
                        }
                    }


                }


            }else{
                // star_position in new_code
                $mini_new_code =str_split($new_code , $star_position) ;

                //for each sales guy , get it's sales area
                foreach($this->old_codes[0] as $key => $codes){

                    // for each sales area (postal code)
                    foreach($codes as $code){
                        //if code start with mini_code add it to conflict array else if the code contain star
                        if(str_starts_with($code, $mini_new_code[0] )){
                            array_push($conflict_codes , $code);
                        }else{
                            $star_pos = strpos($new_code , '*');
                            //if contain star and the star_position_old_code <  star_position_new_code push the code to conflict array
                            //new_code = 587* star_position = 3 , code= 58* s_p = 2 (conflict) || 586* s_p = 3 (not conflict)
                            if($star_pos !== false){
                                if($star_pos < $star_position){
                                    array_push($conflict_codes , $code);
                                }

                            }
                        }


                    }

                }

            }

        }

        return $conflict_codes ;
    }




}
