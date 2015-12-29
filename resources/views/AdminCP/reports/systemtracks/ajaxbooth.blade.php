

<table class="table table-bordered">
				
<thead>
					<tr>
					    <th> User </th>
					    <th> Do </th>
					    <th> Comein at </th>
					    <th> Leave at </th>						
						<!-- <th> Duration </th> -->
					</tr>
				</thead>
				<tbody>

				<?php echo 'hello';?>


						@foreach($systemtracks as $systemtrack)
						<?php 
						$pieces = explode("visit", $systemtrack->do);
							//echo $pieces[0];
							$piecesto = explode("Booth", $pieces[1]);
							$foo= $piecesto[0];
							$value=strval($foo);
							//echo $value ;
							$valtype=gettype($value);
							//echo "value=".$valtype;
							// $arrboothname=array_shift( $foo );
							// echo $arrboothname;
									$boothname= $booth->name;
									//echo "booth".gettype($boothname);


							 if(trim($boothname) == trim($value)){

						?>

					<tr class='success' id='{{ $systemtrack->id }}'>
						<td class="text-center"><?php echo $piecesto[1];?></td>
					    <td class="text-center">{{ $systemtrack->do}}</td>

						<td class="text-center">{{ $systemtrack->comein_at}}</td>
						<td class="text-center">{{ $systemtrack->leave_at}}</td>

						</tr>
						<?php 
						}
						?>
			     		                
			     		@endforeach



				</tbody>
				</table>