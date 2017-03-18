<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

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
        $this->set('title_for_layout','Trang chủ - FreshFood');
		$this->layout = 'index';
		$this->Product->recursive = 0;
		$data = $this->Product->find('all', array(
                'recursive' => -1,
                'order' => array('created' => 'desc'),
            ));
		$this->set('products', $data);
	}
	public function khuyenmai() {
        if ($this->request->is('requested')) {
            $products = $this->Product->find('all', array(
                'recursive' => -1,
                'order' => array('created' => 'asc'),
            ));
            return $products;
       }
    }
    public function gift() {
        if ($this->request->is('requested')) {
            $products = $this->Product->find('all', array(
            	'conditions' => array('Product.category_id' => 3),
                'recursive' => -1,
                'order' => array('created' => 'desc'),
            ));
            return $products;
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
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $product = $this->Product->find('first', $options);
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Không tìm thấy sản phẩm này'));
        }
        $this->set('product',$product);
        //$this->set('product', $this->Product->find('first', $options));
        $this->loadModel('Comment');
        $comments=$this->Comment->find('all',array(
                'conditions'=>array(
                        'product_id'=>$product['Product']['id']
                    ),
                'order'=>array('Comment.created'=>'asc'),
                'contain'=>array(
                        'User'=>array('username')
                    )
            ));
        //pr($comments);
        $this ->set('comments',$comments);
        //báo lỗi xác thự dữ liệu khi gởi comment
        if($this->Session->check('comment_errors')){
            $errors=$this->Session->read('comment_errors');
            $this->set('errors',$errors);
            $this->Session->delete('comment_errors');
        }
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Flash->success(__('The product has been deleted.'));
		} else {
			$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
public function view_cart() {
    $this->set('title_for_layout','Giỏ hàng của bạn');
	$this->layout = 'cart';
	// $this->set('title_for_layout','Giỏ hàng của bạn');
    $cart = $this->Session->read('cart');
    $payment = $this->Session->read('payment');
    $this->set(compact('cart', 'payment'));
    // $this->set('title_for_layout', 'Gio hang - Smartphone');
}

public function empty_cart() {
    if ($this->request->is('post')) {
        $this->Session->delete('cart');
        $this->Session->delete('payment');
        $this->redirect($this->referer());
    }
}

public function delete_cart($id = null) {
    if ($this->request->is('post')) {
        $this->Session->delete('cart.' . $id);
        $cart = $this->Session->read('cart');
        if (empty($cart)) {
            $this->empty_cart();
        } else {
            $total = $this->sum($cart);
            $this->Session->write('payment.total', $total);
            if($this->Session->check('payment.coupon')){
                $pay = $total - $this->Session->read('payment.discount')/100*$total;
                $this->Session->write('payment.pay',$pay);
            }}
            $this->redirect($this->referer());
        }$this->redirect($this->referer());
    }


public function update_cart() {


    if ($this->request->is('post')) {
        $data = $this->request->data;
        $cart = $this->Session->read('cart.' . $data['Product']['id']);

        if (empty($cart)) {
        	$this->empty_cart();
            
        } else {
        		$cart['quantity'] = $data['Product']['quantity'];
                $this->Session->write('cart.' . $data['Product']['id'], $cart);
                $cart = $this->Session->read('cart');
                $total = $this->sum($cart);
                $this->Session->write('payment.total', $total);
                if($this->Session->check('payment.coupon')){
                    $pay = $total - $this->Session->read('payment.discount')/100*$total;
                    $this->Session->write('payment.pay',$pay);
                }
                $this->redirect($this->referer());
            
            
        }
        $this->redirect($this->referer());
    }
}
public function add_to_cart($id = null) {
            if($this->request->is('post')){
            $product = $this->Product->find('first',array(
                'recursive'=>1,
                'conditions'=>array('Product.id'=>$id)
                ));
            if($this->Session->check('cart.'.$id)){
                $item=$this->Session->read('cart.'.$id);
                $item['quantity']+=1;
            //$product = $this->request->data;
            /*if ($this->Session->check('cart.' . $id)) {
                $item = $this->Session->read('cart.' . $id);
                $item['quantity'] += $product['quantity'];*/
            } else {
                $item = array(
                    'id' => $product['Product']['id'],
                    'name' => $product['Product']['name'],
                    'image' => $product['Product']['image'],
                    //'category' => $product['Product']['category'],
                    'price' => $product['Product']['price'],
                    'sale_price' => $product['Product']['sale_price'],
                    //'color' => $product['Product']['color'],
                   // 'size' => $product['Product']['size'],
                    'quantity' => 1
                );
            }
            $this->Session->write('cart.' . $id, $item);
            if($this->Session->check('cart.images')){
                $this->Session->delete('cart.images');
            }

            $cart = $this->Session->read('cart');
            $total = $this->sum($cart);
            $this->Session->write('payment.total', $total);
            if($this->Session->check('payment.coupon')){
                    $pay = $total - $this->Session->read('payment.discount')/100*$total;
                    $this->Session->write('payment.pay',$pay);
                }
            //$this->Session->setFlash('Đã thêm sản phẩm vào trong giỏ hàng!', 'default', array('class' => 'alert alert-info'), 'cart');
            $this->redirect($this->referer());
           }
       }
// public function add_to_cart($id = null) {
		
// 		$product = $this->request->data;
//     //tim thong tin san pham    
//    /* $product = $this->Product->find('first', array(
//         'recursive' => -1,
//         'conditions' => array('Product.id' => $id),
//     ));*/
//     if ($this->Session->check('cart.' . $id)) {
//         $item = $this->Session->read('cart.' . $id);
//         $item['quantity'] += $product['quantity'];
//     } else {
//         $item = array(
//             'id' => $product['Product']['id'],
//             'name' => $product['Product']['name'],
//             'image' => $product['Product']['image'],
//             'category_id' => $product['Product']['category_id'],
//             'sale_price' => $product['Product']['sale_price'],
//             'price' => $product['price'],
//         );
//     }

//     //tao gio hang va them san pham vao gio hang
//     $this->Session->write('cart.' . $id, $item);
//     // cart la ten gio hang, .id tuc la luu vi tri cua not
//     // $item la gia tri dua vao
//     //tinh tong gio hang
//     if($this->Session->check('cart.images')){
//     	$this->Session->delete('cart.images');
//     }

//     $cart = $this->Session->read('cart');
//     $total = $this->sum($cart);
// 	$this->Session->write('payment.total', $total);
// 	if($this->Session->check('payment.coupon')){
//             $pay = $total - $this->Session->read('payment.discount')/100*$total;
//             $this->Session->write('payment.pay',$pay);
//         }
//     $this->Session->setFlash('Đã thêm sản phẩm vào trong giỏ hàng!', 'default', array('class' => 'alert alert-info'), 'cart');
//     $this->redirect($this->referer());
// }
         public function get_keyword(){
        if($this ->request->is('post')){
            $this->Product->set($this->request->data);
            $keyword = $this->request->data['Product']['keyword'];
            $this->redirect(array('action'=>'search','keyword'=>$keyword));

        }
    }

    public function search() {
        $this->set('title_for_layout','Sản phẩm ');
        $notfound = false;
        //pr($this->request->params);
        //pr($this->passedArgs); 
        if(!empty($this->request->params['named']['keyword'])){
            $keyword = $this->request->params['named']['keyword'];
            $this->paginate = array(
                'fields' => array('id','name', 'image', 'price', 'sale_price','created'),
                'order' => array('Product.created' => 'Desc'),
                'conditions' => array(
                    'or' => array(
                    'Product.name like' => '%'.$keyword.'%',
                    'Category.name like' => '%'.$keyword.'%'
                    )
                    ),
                'limit' => 15,
                'paramType' => 'querystring',
                );
            $products = $this->paginate('Product');

            if (!empty($products)) {
                $this->set('results', $products);
            } else {
                $notfound = true;
            }
            $this->set('keyword',$keyword);
        }  
            
        
        $this->set('notfound', $notfound);
    }
}