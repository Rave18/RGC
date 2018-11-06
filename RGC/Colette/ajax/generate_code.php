<?php


if(isset($_POST['action'])  && !empty($_POST['action']))
{

                                 $string = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                                                $number = rand(100000,999999);
                                                $year = date("Y");
                                             
                                               $process_transactioncode = $string."-".$number;
                                    
                                                  $coding = $process_transactioncode;
                                             
                                              print $process_transactioncode;

}
                                                



                                      
                                             
                                
?>