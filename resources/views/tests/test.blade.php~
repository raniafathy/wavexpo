<table class="table table-bordered">
				<thead>
					<tr>
					    <th> User </th>
					    <th> Do </th>
					    <th> Leave at </th>						
						<th> Duration </th>
						<th> UserId </th>
					    <th> spotID</th>
					    <th> activityId </th>						
						<th> TypeId </th>
					</tr>
				</thead>
				<tbody>
					

						@foreach ($systemtracks as $systemtrack)
							
						        <tr class="success" id="{{ $systemtrack->id }}">
						            <td class="text-center">{{ $systemtrack->name}}</td>
						            <td class="text-center">{{ $systemtrack->do}}</td>
						            <td class="text-center">{{ $systemtrack->leave_at}}</td>

						            <td class="text-center">{{ $systemtrack->user_id}}</td>
						            <td class="text-center">{{ $systemtrack->spot_id}}</td>

						            <td class="text-center">{{ $systemtrack->activity_id}}</td>
						            <td class="text-center">{{ $systemtrack->type_id}}</td>		            
						            <td class="text-center"><?php 
		                                $date1 = new DateTime($systemtrack->leave_at);
		                                $date2 = new DateTime($systemtrack->comein_at);

		                                // The diff-methods returns a new DateInterval-object...
		                                $diff = $date2->diff($date1);

		                                // Call the format method on the DateInterval-object
		                                echo $diff->format('%h hours %i mintues %s secounds');

		                            ?></td>
						        </tr>
						    
			     		@endforeach
		
				</tbody>
</table>
