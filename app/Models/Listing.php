<?php

     namespace App\Models;

     class Listing
     {
          public static function all(){
               return [
                    [
                        'id' => 1,
                        'title' => 'Listing One',
                        'description'=>'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Listing Two', 
                        'description' =>'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur'
                    ]
                    ];
          }


          public static function find($id){
               $listings = self::all();

               foreach ($listings as $listing) {
                    //the index id seems to be string type
                    //the index id is string as it is a json field 
                    if ($listing['id']== $id) {
                         return $listing;
                    }
               }
          }
     }
     