<?php

include_once("Connectionmysqli.php");

$userId = $_GET['userId'];
$date = $_GET['date'];

$query = "SELECT subject.name AS subjectName, CONCAT(building.name, room.number) AS roomName FROM `schedule`
INNER JOIN `session` ON `session`.id = `schedule`.session_id
INNER JOIN room ON `schedule`.room_id = room.id
INNER JOIN building ON building.id = room.building_id
INNER JOIN class ON class.id = `schedule`.class_id
INNER JOIN subject ON class.subject_id = subject.id
INNER JOIN study ON class.id = study.class_id
WHERE `schedule`.date = '$date' AND study.student_id = $userId";

if ($result=mysqli_query($conn,$query))
{
	if (mysqli_num_rows($result)>0){
		// echo "success";
		$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		// $response['error'] = false; 
		// $response['message'] = 'Login successfull'; 
		// $response['schedule'] = $json;
		echo json_encode($json);
	} else {
		// echo "failed";
		$response['error'] = true; 
		$response['message'] = 'There is no result';
		echo json_encode($response);
	}
}
else
{
    // echo "failed";
	$response['error'] = true; 
	$response['message'] = 'Invalid username or password';
	echo json_encode($response);
}

mysqli_close($conn);

?>