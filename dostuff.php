<?php
    session_start();

    $Status=$_POST["Status"];

    switch($Status){
        case "Email":$Headers="From : Requir.in";
					$To="sshahirh1994@gmail.com";
                    $Data=wordwrap($_POST["Data"],70);
                    if(mail($To,"Write To Us",$Data,$Headers))
                        echo "success";
                    else
                        echo "failure";
                    break;
		case "AddInfoFromCheckOutPage":
					include("connect.php");
					$Check=$OrderNumber=0;
					$Name=$_POST["Name"];
					$Email=$_POST["Email"];
					$Ph_num=$_POST["Ph_num"];
					$An_Ph_num=$_POST["An_Ph_num"];
					$Addr=$_POST["Addr"];
					$An_Addr=$_POST["An_Addr"];
					$Lndmrk=$_POST["Lndmrk"];
					$City=$_POST["City"];
					$Pin=$_POST["Pin"];
					$Total_cost=$_POST["Total_cost"];
					$String1="Name : ".$Name."\nEmail : ".$Email."\nPhone Number 1 : ".$Ph_num."\nPhone Number 2 : ".$An_Ph_num."\nAddress 1 : ".$Addr."\nAddress 2 :".$An_Addr."\nLandmark : ".$Lndmrk."\nCity : ".$City."\nPin : ".$Pin."\n";
					$String2="Name : ".$Name."\n\n\n\n\nItems------\n\n\n";
					$Customer_ID=0;$Purchase_Info="";
					$sql="SELECT Cart_Items,Cart,Purchase_Info,ID,Purchase,Purchase_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."'";
					$result=$connection->query($sql);
					if($result->num_rows>0){
						$row=$result->fetch_assoc();
						$Customer_ID=$row["ID"];$Purchase_Info=$row["Purchase_Info"];$Cart_Items=$row["Cart_Items"];
						$Cart=$row["Cart"];
						$String1=$String1."Customer ID : ".$row["ID"]."\n\n\n\n\nItems------\n\n\n";
						$Num=$row["Purchase"];$Num2=0;
						$Cost=0;
						$Items=explode("-",$row["Purchase_Items"],-1);
						while($Num!=0){
							$Items2=explode("*",$Items[$Num-1],-1);
							$Num2+=$Items2[1];
							include("connect2.php");
							$sql2="SELECT * FROM products WHERE ID='".$Items2[0]."'";
							$result2=$connection2->query($sql2);
							if($result2->num_rows>0){
							$row2=$result2->fetch_assoc();
							$Cost=$row2["Price"]*$Items2[1];
							$String1=$String1."Item Name : ".$row2["Name"]." , Price : ".$row2["Price"]." x ".$Items2[1]." = ".$Cost."\n\n";
							$String2=$String2."Item Name : ".$row2["Name"]." , Price : ".$row2["Price"]." x ".$Items2[1]." = ".$Cost."\n\n";
							if($Cart>0){
								$Cart--;
								$Items3=explode("-",$Cart_Items,-1);
								$key=-1;
								for($i=0;$i<=$Cart;$i++){
								$Items4=explode("*",$Items3[$i],-1);
								if($Items2[0]==$Items4[0]){
								$key=$i;
								break;
								}
								}
								$Temp="";
								for($i=0;$i<=$Cart;$i++){
								if($i!=$key){
								$Temp.=$Items3[$i]."-";
								}
								}
								$sql="UPDATE customers SET Cart_Items='$Temp',Cart=$Cart WHERE ID=".$Customer_ID;
								if($connection->query($sql) === TRUE)
								echo "success";
								else
								echo "Error : ".$connection->error;
							}
							}
							$Num--;
						}
						$String2=$String1."\nTotal Cost : ".$Total_cost." Inclusive of Shipping and Tax\n";
						$String1=$String1."\nTotal Cost : ".$Total_cost."\n";
						
						$Check++;
					}
					else{
						
					}
					$Purchase_Info.="\n\n\n\n------\n\n\n\n".$String2;
					
					$myfile=fopen("ordernumber.txt","r") or die("Cannot open ordernumber.txt");
					$content=fread($myfile,filesize("ordernumber.txt"));
					$OrderNumber=$content;
					fclose($myfile);
					$myfile=fopen("ordernumber.txt","w") or die("Cannot open ordernumber.txt");
					fwrite($myfile,$OrderNumber+1);
					fclose($myfile);
					
					$sql="UPDATE customers SET Purchase_Name='$Name',Purchase_Email='$Email',Phone_number=".$Ph_num.",Another_Phone_number=".$An_Ph_num.",Address='$Addr',Another_Address='$An_Addr',Landmark='$Lndmrk',City='$City',Pin='$Pin',Purchase_Info='$Purchase_Info' WHERE ID=$Customer_ID";
					if($connection->query($sql) === TRUE){
						$time=date(DATE_RFC822);
						$sql="INSERT INTO purchased(Customer_ID,Purchase_Info,Order_Number,Time) VALUES ($Customer_ID,'$String1',$OrderNumber,'$time')";
						if($connection->query($sql) === TRUE){
							$Check++;
						}
						else{
							
						}
						$Check++;
					}
					else{
						
					}
					$Headers="From : Requir.in";
					if(mail($Email,"Confirmation Mail",$String2,$Headers)===TRUE && mail("sshahirh1994@gmail.com","Order Number : ".$OrderNumber,$String1,$Headers)===TRUE){
						$Check++;
					}
					echo $Check;
					break;	
	case "track": include("connect.php");
					$sql="SELECT * from track WHERE IP='".$_SESSION["IP_Address"]."'";
					$result=$connection->query($sql);
					$time=date(DATE_RFC822);
					if($result->num_rows>0){
						$sql="UPDATE track SET Time='".$time."' WHERE IP='".$_SESSION["IP_Address"]."'";
						if($connection->query($sql) === TRUE){
							echo "success in";
						}
						else{
							echo "failure in";	
						}
					}
					else{
						$IP=$_SESSION["IP_Address"];
						$sql="INSERT INTO track(IP,Time) VALUES ('$IP','$time')";
						if($connection->query($sql) === TRUE){
							echo "success in insert";
						}
						else{
							echo "failure in insert : ".$connection->error;	
						}
					}
			break;
								
    }
?>