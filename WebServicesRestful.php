<?php 

	function getStudent() {
		$content = @file_get_contents('http://localhost:8080/web_services/api/v1/students/1');

	 	if ($content==TRUE) {
	 		$data = json_decode($content);
	  		echo 'Id: '.$data->studentId.'<br/>';
	  		echo 'lastName: '.$data->lastName.'<br/>';
	  		echo 'firstName: '.$data->firstName.'<br/>';
	  		echo 'classCodes: ';

	  		echo 'las clases del estudiante son: ';

	  		for ($i = 0; $i < count($data->classCodes) - 1; $i++) {
	  			echo $data->classCodes[$i].', ';
	  		}
	  		
	  		if (count($data->classCodes) > 0) {
	  			echo $data->classCodes[count($data->classCodes) - 1].;
	  		}

	  		if (count($data->classCodes) <=0) {
	  			echo 'no tiene clases asignadas';
	  		}

	 	}
	}

	function getList() {
		$content = @file_get_contents('http://localhost:8080/web_services/api/v1/students');

	 	if ($content==TRUE) {
	 		$data = json_decode($content);

	 		for ($i = 0; $i < count($data); $i++) {
	 			echo 'studentId: '.$data[$i]->studentId.'<br/>';
		  		echo 'lastName: '.$data[$i]->lastName.'<br/>';
		  		echo 'firstName: '.$data[$i]->firstName.'<br/>';
		  		echo 'classCodes: ';

		  		iecho 'las clases asigndas son: ';

		  		for ($j = 0; $j < count($data[$i]->classCodes) - 1; $j++) {
		  			echo $data[$i]->classCodes[$j].', ';
		  		}
		  		
		  		if (count($data[$i]->classCodes) > 0) {
		  			echo $data[$i]->classCodes[count($data[$i]->classCodes) - 1].;
		  		}

		  		if (count($data[$i]->classCodes) <=0) {
	  				echo 'no tiene ninguna clase asignada';
	  			}

		  		
	 		}
	 	}
	}

	function postStudent() {
		$data = array(
		    'studentId' => 1,
		    'lastName' => 'Mamani',
		    'firstName' => 'Abel',
		    'classCodes' => array('sis-info', 'sis-web')
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);
		$url = 'http://localhost:8080/web_services/api/v1/students';
		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
	}

	set_time_limit(5);


	getList();

?>