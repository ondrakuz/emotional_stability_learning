<?php // this controller is just copy from administration, rewrite needed
class SendResultsController extends Controller
{
    
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $fusersModel = new FUsersModel();
        $lectorsModel = new LectorsModel();
        $problemModel = new ProblemModel();
        $answerModel = new AnswerModel();
        
        session_start();
        
        $results = $_SESSION['results'];
        $ids = $_COOKIE['user_id'];
        $lectors = $lectorsModel->selectByIdS($ids);
        $student = $fusersModel->selectById($ids);
        
        $numr = count($results);
        $results_text =  "<h1>".$expressions['Results of learning of user']." $student[nick]"."</h1>\n";
        for($i = 0; $i < $numr; $i++)
        {
            $problem = $problemModel->selectById($results[$i]['idp']);
            $results_text .= "<p><strong>".$expressions['Problem'].":</strong> ".$problem['name']."<br />\n";
            //$results[$i]['problem'] = $problem['name'];
            if ($results[$i]['ida'] == -1)
            {
                $results_text .= "<strong>".$expressions['Solution'].":</strong> ".$expressions['I can solve this']."</p>\n";
                //$results[$i]['answer'] = $expressions['I can solve this'];
            }
            else
            {
                $answer = $answerModel->selectById($results[$i]['ida']);
                $results_text .= "<strong>".$expressions['Solution'].":</strong> ".$answer['answer']."</p>\n";
                //$results[$i]['answer'] = $answer['answer'];
            }
        }
        session_destroy();
        
        require_once('administrator/PHPMailer/src/PHPMailer.php');
        $mailer = new \PHPMailer\PHPMailer\PHPMailer(False);
        $mailer->CharSet = 'UTF-8'; // Výchozí kódování není UTF-8, potřeba nastavit
        $mailer->isHTML(true); // Email bude ve formátu HTML
        $mailer->setFrom($student['email'], $this->siteName.' - '.$student['nick']); // Nastavení odesílatele
        // Nastavení použití mail() funkce v PHP
        // Dále isSMTP() a instanční proměnné $Host, $Port, $Username, $Password, $SMTPSecure, $SMTPAuth a další
        // Případně isSendmail()
        $mailer->isMail();
        
        // V případě více příjemců v addAddress() bude každému odeslán email zvlášť,
        // výchozí chování je 1 email se všemi příjemci
        // Funguje pouze s isMail() a isSendmail(), nelze použít s SMTP
        $mailer->SingleTo = true;
        
        $mailer->Subject = $expressions['Results of learning of user']." $student[nick] ".$expressions['on website']." ".$this->siteName;
        
        // Jméno a příjmení není povinné, rovněž u addCC(), addBCC() a addReplyTo()
        // Kopie a skrytá kopie - addCC() a addBCC()
        
        foreach($lectors as $lector)
        {
            if ($_POST['idl'.$lector['lector']])
            {
                $flector = $fusersModel->selectById($lector['lector']);
                $mailer->addAddress("$flector[email]", "$flector[nick]");
            }
        }
        // Nastavení jiného emailu pro odpověď, než z jaké byl odeslán
        //$mailer->addReplyTo("reply@domain.cz", "Jméno a příjmení");
        
        // Připojení existujícího souboru jako přílohy - Název není povinný
        //$mailer->addAttachment("administrator/Mpdf/tmp/Faktura-$order[number].pdf", "Faktura-$order[number].pdf");
        // Připojení souboru, který neexistuje - vytvořen za běhu, název je povinný
        //$mailer->addStringAttachment($fileBLOB, "Název přílohy");
        
        // Vloží soubor pro inline použití v emailu,
        // následně v obsahu emailu je použit jako <img src="cid:mujcid1">
        // Podobně existuje také funkce addStringEmbeddedImage()
        //$mailer->addEmbeddedImage("/path/to/file", "mujcid1", "nepovinný název přílohy");
        
        // Hlavní obsah zprávy, je-li isHTML(true) vložit HTML zprávu
        // V případě isHTML(false) - vložit plain text zprávu
        $mailer->Body = $results_text;
          // Je-li isHTML(true), lze vložit plain text obsah zprávy
          // pro emailové klienty, kteří nepodporují HTML zprávy
          // V případě isHTML(false) nepoužívat
          $mailer->AltBody = "";
          
          if($mailer->send())
          {
              $this->redirect("/$lang");
          }
    }
}
?>
