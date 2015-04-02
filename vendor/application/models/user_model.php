<?php

class User_model extends CI_Model {

    private $table;

    protected $id;
    protected $fullName;
    protected $email;
    protected $idProfile;
    protected $dateCreate;
    protected $dateUpdate;
    protected $status;


    /* aux objs */

    protected $dateCreateFormatted;
    protected $dateUpdateFormatted;
    protected $profileTitle;

    protected $profiles = array(
        '1' => 'Administrador',
        '2' => 'Analista',
        '3' => 'Assistente'
    );

    protected $statusTitle = array(
        '1' => 'Ativo',
        '2' => 'Inativo',
    );

    public function __construct(){
        $this->load->database();
        $this->table = 'user_table';
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $idProfile
     */
    public function setIdProfile($idProfile)
    {
        $this->idProfile = $idProfile;
    }

    /**
     * @return mixed
     */
    public function getIdProfile()
    {
        return $this->idProfile;
    }

    public function getProfileTitle() {
        if (NULL === $this->profileTitle)
            $this->setProfileTitle();
        return $this->profileTitle;
    }

    public function setProfileTitle() {
        $this->profileTitle = $this->profiles[$this->idProfile];
        return $this;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function getDateCreateFormatted() {
        if (NULL === $this->dateCreateFormatted)
            $this->setDateCreateFormatted();
        return $this->dateCreateFormatted;
    }

    public function setDateCreateFormatted() {
        $this->dateCreateFormatted = $this->useful->formatDate($this->dateCreate, 'd/m/Y H:i:s');
        return $this;
    }

    /**
     * @param mixed $dateUpdate
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    public function getDateUpdateFormatted() {
        if (NULL === $this->dateUpdateFormatted)
            $this->setDateUpdateFormatted();
        return $this->dateUpdateFormatted;
    }

    public function setDateUpdateFormatted() {
        $this->dateUpdateFormatted = $this->useful->formatDate($this->dateUpdate, 'd/m/Y H:i:s');
        return $this;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function get($id=false){

        if ($id === false){
            $this->db->from('user_table');
            $this->db->order_by('full_name', 'asc');

            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('user_table', array('id' => $id));

        return $query->row_array();
    }

    public function getProfiles(){
        return $this->profiles;
    }

    public function getStatusTitle(){
        return $this->statusTitle[$this->status];
    }

    public function insert(){

        $this->load->library('useful');

        $data = array(
            'full_name'   => $this->input->post('fullName'),
            'email'       => $this->input->post('email'),
            'id_profile'  => $this->input->post('id_profile'),
            'status'      => $this->input->post('status'),
            'date_create' => date('Y-m-d H:i:s'),
            'password'    => $this->useful->encrypt_password($this->input->post('email'), $this->input->post('password'))
        );

        return $this->db->insert($this->table, $data);
    }

    public function update($id){

        $data = array(
            'full_name'   => $this->input->post('fullName'),
            'email'       => $this->input->post('email'),
            'id_profile'  => $this->input->post('id_profile'),
            'date_update' => date('Y-m-d H:i:s'),
            'status'      => $this->input->post('status'),
        );

        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    public function delete($id){
        $data = array(
            'id' => $id
        );

        return $this->db->delete($this->table, $data);
    }

}