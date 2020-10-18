<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Role;
use App\Model\Entity\Subscription;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;




class CustomersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Appointments');
        $this->Auth->allow(['view']);


    }

    public function isAuthorized($user)
    {
        if (isset($user['role']) &&  $user['role'] === 'admin'  || $user['role'] === 'customer') {
            return true;
        }
    }

    public function home()
    {
        $this->layout='/customerhome';
    }


    private function getUser($userID)
    {
        $user = $this->Users->find()
            ->where(['id' => $userID])
            ->first();
        return $user;
    }

    public function allappointments($id = null){
        $this->layout='/customerhome';
//        $this->paginate = [
//            'contain' => ['Users'],
//        ];
        $this->loadModel('Appointments');
        $this->loadModel('Services');
        $query = $this->Services->find('all');
        $services = $query->all();
        $appointments = $this->paginate($this->Appointments);
        $userId = $this->Auth->user('id');

        $query = $this->Appointments->find('all', ['conditions' => ['user_id' => $userId]]);
        $appointments = $query->all();

        $this->set(compact('appointments'));
        $this->set(compact('services'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $email1 =  $appointment['appointment_email'];
            $name = $appointment['appointment_name'];
            $phone_number = $appointment['appointment_phone'];
            $time = $appointment['appointment_datetime'];
            $email = new Email();
            $email->template('cancel', 'cancel');
            $email->emailFormat('both');
            $email->from('beth_beautycare@foxmail.com');
            $email->to('pinzhuoz@gmail.com');
            $email->subject('An appointment has been canceled');
            $email->viewVars(['email1' => $email1, 'name' => $name, 'phone_number' => $phone_number, 'time' => $time]);
            if ($email->send()) {
                $this->Flash->success(__('The appointment has been deleted.'));

            } else {
                $this->Flash->error(__("Oops, we can't process your request: ") . $email->smtpError);
            }
        }
        return $this->redirect(['action' => 'allappointments']);
    }



    public function appointment($id = null){

        $this->layout='/customerhome';
        $userId = $this->Auth->user('id');
        $user = $this->getUser($userId);
        $this->loadModel('Services');
        $name = $user['first_name']. '' .$user['surname'];
        $query = $this->Services->find('all');
        $services = $query->all();
        $queryTime = $this->Appointments->find('all');
        $datetime = $queryTime->all();


        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Appointments');
            $appoint = $this->Appointments->newEntity();
            $appoint->user_id = $userId;
            $appoint = $this->Appointments->patchEntity($appoint, $this->request->getData());
            foreach ($datetime as $item){
                if ($appoint->appointment_datetime == $item->appointment_datetime){
                    $this->Flash->error(__("Oops, this timeslot has already been reserved, please try another time."));
                    return $this->redirect(['controller' => 'Customers', 'action' => 'appointment']);
                }
            }
            if ($this->Appointments->save($appoint)) {
                $comment = $appoint['appointment_comment'];
                $email1 =  $appoint['appointment_email'];
                $name = $appoint['appointment_name'];
                $phone_number = $appoint['appointment_phone'];
                $time = $appoint['appointment_datetime'];
                $email = new Email();
                $email->template('appointment', 'appointment');
                $email->emailFormat('both');
                $email->from('beth_beautycare@foxmail.com');
                $email->to('pinzhuoz@gmail.com');
                $email->subject('New Appointment');
                $email->viewVars(['email1' => $email1, 'comment' => $comment, 'name' => $name, 'phone_number' => $phone_number, 'time' => $time]);
                if ($email->send()) {
                    $this->Flash->success(__('We have received your appointment!'));

                } else {
                    $this->Flash->error(__("Oops, we can't process your request: ") . $email->smtpError);
                }
                $this->redirect(['controller' => 'Customers', 'action' => 'allappointments']);
            }
        }
        $this->set('user', $user);
        $this->set('name', $name);
        $this->set(compact('services'));
        $this->set(compact('appointments'));
    }

    public function profile($id = null)
    {
        $this->layout='/customerhome';

        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put','post','patch'])) {


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('User Updated Successfully'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            }else {
                $this->Flash->error(__('Unable to edit your profile. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }





    public function configuration() {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'YOUR APPLICATION CLIENT ID',  // you will get information about client id and secret once you have created test account in paypal sandbox
                'YOUR APPLICATION CLIENT SECRET'
            )
        );
    }





}
