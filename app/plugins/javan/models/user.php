<?php
class User extends JavanAppModel {

	var $name = 'User';
	var $actsAs = array('Acl' => array('requester'));

	var $validate = array(
		'username' => array('alphanumeric'),
		'password' => array('alphanumeric')
	);

    function isAuthorized($user, $controller, $action){
        return false;
    }

	function parentNode() {
        if(isset($this->data['User']['group_id']) && $this->data['User']['group_id'] != null){
			return array('Group'=>array('id' => $this->data['User']['group_id']));
        }else{
            return false;
        }
	}


	function afterSave($created) {
        //create
        if ($created) {
            $parent = $this->parentNode();

            $node = $this->node();
            $aro = $node[0];

            if($parent){
                $parent = $this->node($parent);
                $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            }else{
                $aro['Aro']['parent_id'] = null;
            }
            $aro['Aro']['alias'] = $this->data['User']['username'];

            $this->Aro->save($aro);
        }else{
            $newParentNode = $this->node(array('Group'=>array('id'=>$this->data['User']['group_id'])));
            $node = $this->node($this->data);
            $node = $node['0'];
            $node['Aro']['parent_id'] = $newParentNode[0]['Aro']['id'];
            $this->Aro->save($node);
        }

    }

}
?>
