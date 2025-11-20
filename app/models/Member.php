<?php
class Member extends Model {
    public function getMembers(){
        $this->db->query('SELECT members.*, teams.name as team_name 
                          FROM members 
                          LEFT JOIN teams ON members.team_id = teams.id 
                          ORDER BY members.created_at DESC');
        return $this->db->resultSet();
    }

    public function getMemberCount(){
        $this->db->query('SELECT COUNT(*) as count FROM members');
        $row = $this->db->single();
        return $row->count;
    }

    public function addMember($data){
        $this->db->query('INSERT INTO members (full_name, email, phone, address, join_date, team_id) VALUES(:name, :email, :phone, :address, :join_date, :team_id)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':join_date', $data['join_date']);
        $this->db->bind(':team_id', $data['team_id']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getMemberById($id){
        $this->db->query('SELECT * FROM members WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateMember($data){
        $this->db->query('UPDATE members SET full_name = :name, email = :email, phone = :phone, address = :address, team_id = :team_id WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':team_id', $data['team_id']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteMember($id){
        $this->db->query('DELETE FROM members WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
