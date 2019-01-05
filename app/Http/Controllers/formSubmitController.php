<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class formSubmitController extends Controller
{

	const ARR_MIN = 0;
	const ARR_MAX = 100;

	private $inputs;
	private $MISSING_NUMBER_ARRAY = [];

	public function __construct(Request $_request)
	{

		$this->inputs = $_request->all();

	}

	public function formSubmitted(Request $_request){

		if( !isset($this->inputs["number_submit"]) ){
			return Response("Number wasn't set", 500)->header('Content-Type', 'text/plain');
		}

		//		a. An array should be created which holds values from 1 to 100, however the value that has been entered by the user should be omitted
		for($i = Self::ARR_MIN; $i <= Self::ARR_MAX; $i++){
			if((int)$this->inputs["number_submit"] === $i){
				continue;
			}else{
				$this->MISSING_NUMBER_ARRAY[] = $i;
			}
		}

		//		b. Without prior knowledge of what number was submitted by the user, a function should be written to return the missing number from the array
		$missingNumber = $this->findMissingNumber();
		if($missingNumber==false){
			$resText = "Couldn't find the missing number";
			$resStatus = 500;
		}else{
			$resText = "the number you picked was " . (string)$missingNumber;
			$resStatus = 200;
		}

		//		c. Display the missing number to the screen
		return Response($resText, $resStatus)->header('Content-Type', 'text/plain');
	}

	private function findMissingNumber(){
		for($i = Self::ARR_MIN; $i <= Self::ARR_MAX; $i++){
			if($this->MISSING_NUMBER_ARRAY[$i] != $i) return $i;
		}
		return false;
	}


}
