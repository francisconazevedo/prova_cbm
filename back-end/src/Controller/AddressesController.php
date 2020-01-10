<?php
namespace App\Controller;
header("Access-Control-Allow-Origin: *");
use App\Controller\AppController;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 *
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{

    /**
     * addressesFromDB method
     *
     * @return \Cake\Http\Response|void
     *
     * RETURN ALL ADDRESSES IN DATABASE
     */

    public function addressesFromDB()
    {
        $addresses = $this->paginate($this->Addresses);

        return $this->response->withType("application/json")->withStringBody(json_encode($addresses));
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => []
        ]);

        return $this->response->withType("application/json")->withStringBody(json_encode($address));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        $address = $this->Addresses->newEntity();
        if ($this->request->is('post')) {
            $cep = $this->request->getData('cep');


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://viacep.com.br/ws/".$cep."/json",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            $response = json_decode($response, true);

            // Get value of created
            $response['created'] = date('Y-d-m H:i:s');
            $address = $this->Addresses->patchEntity($address, $response);
            if ($this->Addresses->save($address)) {

                return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'success')));
            } else{
                return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'error')));
            }

        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {

                return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'success')));
            }
            return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'success')));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address)) {

            return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'success')));

        }
        return $this->response->withType("application/json")->withStringBody(json_encode(array('result' => 'error')));
    }
}
