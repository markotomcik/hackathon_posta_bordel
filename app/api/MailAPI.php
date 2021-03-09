<?php
class MailAPI {
    private $mailFrom;

    public function __construct()
    {
        $this->mailFrom = 'Pošta <info@debian>';
    }

    /**
     * @param string $mailFrom
     */
    public function setMailFrom($mailFrom)
    {
        $this->mailFrom = $mailFrom;
    }

    public function deliveryInfo($mailTo)
    {
        $mail = new Nette\Mail\Message;
        $mail->setFrom('info@debian.org', 'Posta')
            ->addTo($mailTo)
            ->setSubject('Info o doručení')
            ->setBody('Dobrý deň,<br>dnes Vám doručíme balík.');

        $mailer = new Nette\Mail\SendmailMailer;
        $mailer->send($mail);
        return 'Poslané';
    }
}