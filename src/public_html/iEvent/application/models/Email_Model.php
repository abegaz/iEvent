<?php
class Email_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function sendInvite()
	{
		
	}

	public function htmlMailSend($data)
	{
		$this->load->library('email');
		
		$this->email->initialize(array(
		  'protocol' => 'mail',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => '	apikey',
		  'smtp_pass' => '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',
		  'smtp_crypto' => 'ssl',
		  'smtp_port' => 465,
		  'mailtype' => 'html',  
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		
		$this->email->from('noReply@lemonhut.net', "You've Recevied an iInvite!");
		$this->email->to($data['Email']);
		$this->email->subject('Email Test');
		$this->email->message($this->load->view('Templates/email_Invite',$data,TRUE));
		$this->email->send();
		
		echo $this->email->print_debugger();
	}
}
?>