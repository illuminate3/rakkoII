Route::post('/text', function()
{
//	$from = '+15005550006'; // zillow test number
	$from = '5017256292'; // twilio account phone number

//  $number = Input::get('phoneNumber');
  $number = '+15012136103';
//  $message = Input::get('message');
  $message = 'Hi Alex';

//dd($number);

	$sid = 'AC3af1f2bde064d1c5f68822be11c4ff7a'; // real
//	$sid = 'AC1bfafd28831d177004e7bcf744c8276b'; // test

	$token = 'c0644e664fe34f5498ad6186c7846bc6'; // real
//	$token = '0db94e05450ec328371e07bb6ec5e039'; // test

  // Create an authenticated client for the Twilio API
  $client = new Services_Twilio($sid, $token);

  try {
    // Use the Twilio REST API client to send a text message
    $m = $client->account->messages->sendMessage(
		$from, // the text will be sent from your Twilio number
		$number, // the phone number the text will be sent to
		$message // the body of the text message
    );

  } catch(Services_Twilio_RestException $e) {
    // Return and render the exception object, or handle the error as needed
    return $e;
  };

  // Return the message object to the browser as JSON
  return $m;

});
