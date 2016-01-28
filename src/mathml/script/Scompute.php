<?php
    //error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    error_reporting(0);
    include_once '../model/Mexpression.php';
    $id = $_POST['id'];
    $jNiz = json_decode($_POST['niz']);
    $jNiz = json_decode(json_encode($jNiz), true);
    //echo $jNiz["x"];
    //print_r($jNiz);
    $xml = simplexml_load_string(Mexpression::getContent($id)); 
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    if (key($array)=="apply") $array = $array["apply"];
    
    //print_r($array);
    
    function pravi($niz,$op,$jNiz)
    {
            //print_r($niz);
            //echo $op;
            switch ($op)
            {
                case "apply"://print_r($niz); echo key($niz);
                             $res = pravi($niz,key($niz),$jNiz);
                             //echo $res." ";
                             return $res;
                             break;
                case "ci": //echo $jNiz[$niz]." ";
                           return $jNiz[$niz];
                           break;
                case "cn": //echo $niz." ";
                           return $niz;
                           break;
                default: //echo $lvl." ".key($niz)."<br />"; break;
                        switch ($op)
                        {
                            case "plus": $res=0;
                                         while (next($niz))
                                         {
                                             //print_r(current($niz));
                                             $nn=current($niz);
                                             //print_r($nn[1]);
                                             if (key($nn)=="0")
                                             {
                                                 for ($i=0;$i<count($nn);$i++)
                                                 {
                                                     //echo "k";
                                                     $res+=pravi($nn[$i],key($niz),$jNiz); 
                                                 }
                                                 //echo count(current($niz));
                                             } else $res+=pravi(current($niz),key($niz),$jNiz);
                                         }
                                         //echo $res." ";
                                         return $res;
                                         break;
                            case "times": $res=1;
                                            //print_r($niz);
                                          while (next($niz))
                                          {
                                              
                                             //print_r(current($niz));
                                             $nn=current($niz);
                                             //print_r($nn[1]);
                                             if (key($nn)=="0")
                                             {
                                                 for ($i=0;$i<count($nn);$i++)
                                                 {
                                                     //echo "k";
                                                     $res*=pravi($nn[$i],key($niz),$jNiz); 
                                                 }
                                                 //echo count(current($niz));
                                             } else $res*=pravi(current($niz),key($niz),$jNiz);
                                          }
                                          return $res;
                                          break;
                            case "power": next($niz);
                                          $nn=current($niz);
                                          //print_r($nn[1]);
                                          if (key($nn)=="0")
                                          {
                                                 $f=pravi($nn[0],key($niz),$jNiz);
                                                 $s=pravi($nn[1],key($niz),$jNiz);
                                          } else { 
                                                 $f=pravi(current($niz),key($niz),$jNiz);
                                                 next($niz);
                                                 $s=pravi(current($niz),key($niz),$jNiz);
                                          }
                                          $res = pow($f,$s);
                                          return $res;
                                          break;
                            case "root":  next($niz);
                                          $t=pravi(current($niz),key($niz),$jNiz);
                                          $res = sqrt($t);
                                          return $res;
                                          break;
                            case "minus": next($niz);
                                          $nn=current($niz);
                                          if (key($nn)=="0")
                                          {
                                              $res=pravi($nn[0],key($niz),$jNiz);
                                              for ($i=1;$i<count($nn);$i++)
                                              {
                                                    //echo "k";
                                                    $res-=pravi($nn[$i],key($niz),$jNiz); 
                                              }
                                          }
                                          else $res=pravi(current($niz),key($niz),$jNiz);
                                          while (next($niz))
                                          {
                                                   //print_r(current($niz));
                                                   $nn=current($niz);
                                                   //print_r($nn[1]);
                                                   if (key($nn)=="0")
                                                   {
                                                       for ($i=0;$i<count($nn);$i++)
                                                       {
                                                           //echo "k";
                                                           //print_r($res);
                                                           $res-=pravi($nn[$i],key($niz),$jNiz);
                                                       }
                                                       //echo count(current($niz));
                                                   } else $res-=pravi(current($niz),key($niz),$jNiz);
                                          }
                                          //echo $res." ";
                                          return $res;
                                          break;
                            case "divide": next($niz);
                                           $nn=current($niz);
                                           //print_r($nn[1]);
                                           if (key($nn)=="0")
                                           {
                                                  $f=pravi($nn[0],key($niz),$jNiz);
                                                  $s=pravi($nn[1],key($niz),$jNiz);
                                           } else { 
                                                  $f=pravi(current($niz),key($niz),$jNiz);
                                                  next($niz);
                                                  $s=pravi(current($niz),key($niz),$jNiz);
                                           }
                                           $res = $f/$s;
                                           return $res;
                                           break;
                            case "factorial": next($niz);
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              $res=1;
                                              for ($i=2;$i<=$f;$i++) $res=$res*$i;
                                              return $res;
                                              break;
                            case "eq": next($niz);
                                       $nn=current($niz);
                                       //print_r($nn[1]);
                                       if (key($nn)=="0")
                                       {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                       } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                       }
                                       if ($f==$s) return "TRUE"; else return "FALSE";
                                       break;
                            case "neq": next($niz);
                                        $nn=current($niz);
                                        //print_r($nn[1]);
                                        if (key($nn)=="0")
                                        {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                        } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                        }
                                        if ($f!=$s) return "TRUE"; else return "FALSE";
                                        break;
                            case "gt": next($niz);
                                       $nn=current($niz);
                                       //print_r($nn[1]);
                                       if (key($nn)=="0")
                                       {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                       } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                       }
                                       if ($f>$s) return "TRUE"; else return "FALSE";
                                       break;
                            case "lt": next($niz);
                                       $nn=current($niz);
                                       //print_r($nn[1]);
                                       if (key($nn)=="0")
                                       {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                       } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                       }
                                       if ($f<$s) return "TRUE"; else return "FALSE";
                                       break;
                            case "geq": next($niz);
                                       $nn=current($niz);
                                       //print_r($nn[1]);
                                       if (key($nn)=="0")
                                       {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                       } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                       }
                                       if ($f>=$s) return "TRUE"; else return "FALSE";
                                       break;
                            case "leq": next($niz);
                                       $nn=current($niz);
                                       //print_r($nn[1]);
                                       if (key($nn)=="0")
                                       {
                                              $f=pravi($nn[0],key($niz),$jNiz);
                                              $s=pravi($nn[1],key($niz),$jNiz);
                                       } else { 
                                              $f=pravi(current($niz),key($niz),$jNiz);
                                              next($niz);
                                              $s=pravi(current($niz),key($niz),$jNiz);
                                       }
                                       if ($f<=$s) return "TRUE"; else return "FALSE";
                                       break;
                            case "abs": next($niz);
                                        $f=pravi(current($niz),key($niz),$jNiz);
                                        return abs($f);
                                        break;
                        }
                        break;
            }
    }
    
    $v=pravi($array,key($array),$jNiz);
    echo $v;

?>