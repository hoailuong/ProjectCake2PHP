<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}
public function checkout(){
	$this->layout = 'checkout';
		$this->set('title_for_layout','Đặt hàng');
		if($this->request->is('post')){
			$info = $this->request->data['Order'];
			if($this->Session->check('user')){
				$user = $this->Session->read('user');
				$user_id = $user['id'];
			}else{
				$user_id = '';
			}
			$data = array(
				'user_id' => $user_id,
				'name' => $info['name'],
				'email' => $info['email'],
				'phone' => $info['phone'],
				'address' => $info['address'],
				'payment_info' => json_encode($this->Session->read('payment')),
				'cart_infor' => json_encode($this->Session->read('cart')),
				'customer_info' => json_encode($this->request->data['Order']),
				'status' => 0,
				);
			if($this->Session->check('cart')){
				$tt = $this->Session->read('cart');
			}
			$result = '<table><tr><td>Têm sản phẩm</td><td>Giá</td></tr>';
			foreach ($tt as $key) {
				$result .= '<tr><td>'.$key['name'].'</td><td>'.$key['sale_price'].'</td></tr>';
			}
			if($this->Order->saveAll($data)){
				$Email = new CakeEmail('smtp');
				$Email->emailFormat('html');
				$Email->from(array('ndvuong1996@gmail.com' => 'freshfood.com'));
				$Email->to($this->request->data['Order']['email']);
				$Email->subject('Cám ơn bạn đã mua hàng');
				$Email->send('Bạn đã đặt hàng thành công tại freshfood.com. Thông tin
					đơn hàng của bạn là: 
					'.'<br>Họ và tên: '.$this->request->data['Order']['name'].'<br>Email: '.$this->request->data['Order']['email'].'<br>Số điện thoại: '.$this->request->data['Order']['phone'].'<br>Địa chỉ: '.$this->request->data['Order']['address'].'<br><br>'.$result.'</table>'
					);

				$this->Session->delete('cart');
				$this->Session->delete('payment');
				$this->Session->setFlash(__('Đơn hàng của bạn đã được chuyển đi.'),'default','order');
			$this->redirect(array('controller' => 'products', 'action' => 'index'));
			}else{
				$this->Session->setFlash(__('Đặt hàng không thành công'),'default','order');
			}
			
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
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
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}
public function admin_done($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}else{
			$data = $this->Order->find('first',array('conditions' => array('Order.id' => $id)));
			$data['Order']['status'] = 1;
			$data['Order']['buyer_name'] = 'danh';
			$new_order = $data['Order'];
			$this->Order->id = $id;
			if($this->Order->saveField('status',$data['Order']['status'])){
				$this->Session->setFlash(__('Đơn hàng đã được xử lý'));
			}$this->redirect($this->referer());
			
		}
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
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
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
