<?php namespace App\Mailer;

use Cake\Mailer\Mailer;

class PlayersMailer extends Mailer
{
    public function welcome($player)
    {
        $this
            ->to($player->email)
            ->setSubject(sprintf('Welcome !'))
            ->setTemplate('welcome_mail', 'custom'); // Par défaut le template avec le même nom que le nom de la méthode est utilisé.
    }

    public function resetPassword($email, $pwd)
    {
        $this
            ->to($email)
            ->setSubject('WebArena - Password reinitialization')
            ->set(['password' => $pwd]);
    }
}

?>