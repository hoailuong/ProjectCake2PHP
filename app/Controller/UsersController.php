<?php
class UsersController extends AppController{
    var $name = "Users"; 
    var $helpers = array("Html"); 
    var $component = array("Session");
    var $uses = array('User','Order');
 public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
               'thumbnailSizes' => array(
                    'thumb' => '80x80'
                )
            )
        )
    );

    
    function login(){
        $error="";
        if(isset($_POST['ok'])){
           $email = $_POST['email'];
           $password = $_POST['password'];
           if($this->User->checkLogin($email,$password)){
                $user_info = $this->User->find('first',array('conditions' => array('email' => $email)));
                $this->Session->write("session",$user_info); //ghi session
                $this->redirect(array('controller' => 'products', 'action' => 'index')); //đăng nhập thành công thì chuyển trang thông tin
            }else{ 
                $error = "Tên đăng nhập hoac mật khẩu không đúng"; 
           } 
        } 
        $this->set("error",$error);
    }
    
    function info(){
        if($this->Session->check("session")){//kiểm tra có session hay không
            $user_info = $this->Session->read('session');
            $this->set("user", $user_info);
        }else{
            $this->render("login");
        }
    }    
     
    function logout(){
        $this->Session->delete('session'); //xóa session
        $this->redirect("login"); //chuyển trang login
    }
 

    
/**
     * @return void
 */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->layout = 'register';
        $this->set('title_for_layout','Đăng ký');
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                 $this->redirect("login");
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        $this->redirect('/');
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $users = $this->User->find('all',array('order' => array('User.created' => 'desc')));
        $this->set('users', $users);
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

        $this->set('user', $this->User->find('first', $options));
        // $options2 = array(
        //      'conditions' => array('Order.user_id' => $id),
        //      'order' => array('Order.created' => 'desc'),
        //  );
        // $orders = $this->Order->find('all',$options2);
        $this->set('orders',$orders);
    }

    public function myorder(){
        $this->set('title_for_layout','Don hang cua ban - Hai Yen');

        if($this->Session->check('user')){
            $user = $this->Session->read('user');
            $this->set('user',$this->User->find('first',array('conditions' => array('User.id' => $user['id']))));
            $options2 = array(
                'conditions' => array('Order.user_id' => $user['id']),
                'order' => array('Order.created' => 'desc'),
            );
        $orders = $this->Order->find('all',$options2);
        $this->set('orders',$orders);
        }
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function home() {
        $this->layout = 'admin_home';
    }

}
