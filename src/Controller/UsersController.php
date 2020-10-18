<?php
/**
 * Created by PhpStorm.
 * User: angga
 * Date: 22/08/2018
 * Time: 4:19 PM
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Enquiry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use App\Model\Entity\Role;
use App\Model\Entity\Subscription;
use Cake\ORM\Table;
use Cake\Controller\Component\PaginatorComponent;
use Cake\ORM\TableRegistry;
use Cake\Database\Schema\Collection;
use Cake\Database\Schema\TableSchema;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\Behavior\CounterCacheBehavior;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Appointments');
        $this->loadModel('Users');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register','login']);
    }

    public function configuration()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'YOUR APPLICATION CLIENT ID',  // you will get information about client id and secret once you have created test account in paypal sandbox
                'YOUR APPLICATION CLIENT SECRET'
            )
        );
    }

    public function adminappointment() {
        $this->layout='/adminhome';
        $appointments = $this->paginate($this->Appointments);
        $query = $this->Appointments->find('all');
        $appointments = $query->all();

        $this->set(compact('appointments'));
    }



    public function adminmgmt()
    {
        $this->layout='/adminhome';
        $users = $this->paginate($this->Users);
        $query = $this->Users->find('all', ['conditions' => ['role' => 'customer']]);
        $users = $query->all();

        $this->set(compact('users'));
    }



    public function view($id)
    {
        $this->layout='/home';
        $user = $this->Users->get($id);
        $this->set(compact('user'));
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }




    public function register()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->getData());

            if ($this->Users->save($user)) {

                $this->Flash->success(__('You are now successfully signed up! Please login'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

            }


            $this->Flash->error(__('Unable to Sign up.'));
        }
    }



    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();//redirects to each users role after login
            if ($user) {
                if (Role::isAdmin($user['role'])) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'users','action' => 'home']);
                } elseif (Role::isCustomer($user['role'])) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'customers', 'action' => 'home']);
                }
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }








    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }









    public function home()
    {
        $this->layout='/adminhome';
    }



}
