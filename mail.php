	<?php	
	
	function Mailer($mail_nhan,$ten_nhan,$tieude,$tomtat,$noidung)
	{
		// Khai báo thư viên phpmailer
		//require "lib/class.phpmailer.php";
		require_once 'mailer/PHPMailerAutoload.php';
		 
		// Khai báo tạo PHPMailer
		$mail = new PHPMailer();
		$mail->Charset = "UTF-8";
		//Khai báo gửi mail bằng SMTP
		$mail->IsSMTP();
		//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
		// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
		// 1 = Thông báo lỗi ở client
		// 2 = Thông báo lỗi cả client và lỗi ở server
		$mail->SMTPDebug  = 2;
		 
		$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
		$mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
		$mail->Port       = 587; // cổng để gửi mail
		$mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
		$mail->SMTPAuth   = true; //Xác thực SMTP
		$mail->Username   = "huonghuong08.php@gmail.com"; // Tên đăng nhập tài khoản Gmail
		$mail->Password   = "123@123@123"; //Mật khẩu của gmail
		$mail->SetFrom("huonghuong08.php@gmail.com", "PHP 15/3"); // Thông tin người gửi
		$mail->AddReplyTo("huonghuong08.php@gmail.com","Php 15/3");// Ấn định email sẽ nhận khi người dùng reply lại.


		$mail->AddAddress($mail_nhan, $ten_nhan);//Email của người nhận
		$mail->Subject = $tieude; //Tiêu đề của thư
		$mail->MsgHTML($noidung); //Nội dung của bức thư.
		// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
		// Gửi thư với tập tin html
		$mail->AltBody = $tomtat;//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
		//$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach
		 
		//Tiến hành gửi email và kiểm tra lỗi
		if(!$mail->Send()) {
		  	echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;

		} else {
		  	echo "Đã gửi thư thành công!";
		}
	}

 ?>