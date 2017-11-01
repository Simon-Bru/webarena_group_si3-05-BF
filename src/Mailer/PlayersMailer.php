<?php namespace App\Mailer;

use Cake\Mailer\Mailer;

class PlayersMailer extends Mailer
{
    public function welcome($player)
    {
        $this
            ->to($player->email)
            ->setSubject(sprintf('Welcome !'))
            ->setEmailFormat('html')
            ->setTemplate('default')
            ->set(['content' => 'Welcome to webarena! You can now login to fight to death !!']);
    }

    public function resetPassword($email, $pwd)
    {
        $this
            ->to($email)
            ->setEmailFormat('html')
            ->setSubject('WebArena - Password reinitialization')
            ->set(['password' => $pwd]);
    }

    public function implementedEvents()
    {
        return [
            'Model.afterSave' => 'onRegistration'
        ];
    }

    public function onRegistration(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if ($entity->isNew()) {
            $this->send('welcome', [$entity]);
        }
    }

}

?>