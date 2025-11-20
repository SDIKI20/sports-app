<?php
class Member extends Model {
    public function getMembers(){
        $this->db->query('SELECT members.*, teams.name as team_name, GROUP_CONCAT(DISTINCT skills.skill_name SEPARATOR ", ") as skills
                          FROM members
                          LEFT JOIN teams ON members.team_id = teams.id
                          LEFT JOIN skills ON skills.member_id = members.id
                          GROUP BY members.id
                          ORDER BY members.created_at DESC');
        return $this->db->resultSet();
    }

    public function getMemberCount(){
        $this->db->query('SELECT COUNT(*) as count FROM members');
        $row = $this->db->single();
        return $row->count;
    }

    public function addMember($data){
        $this->db->query('INSERT INTO members (full_name, email, phone, address, join_date, team_id, major, photo) VALUES(:name, :email, :phone, :address, :join_date, :team_id, :major, :photo)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':join_date', $data['join_date']);
        $this->db->bind(':team_id', $data['team_id']);
        $this->db->bind(':major', isset($data['major']) ? $data['major'] : null);
        $this->db->bind(':photo', isset($data['photo']) ? $data['photo'] : null);

        if($this->db->execute()){
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getMemberById($id){
        $this->db->query('SELECT members.*, teams.name as team_name, GROUP_CONCAT(DISTINCT skills.skill_name SEPARATOR ", ") as skills
                          FROM members
                          LEFT JOIN teams ON members.team_id = teams.id
                          LEFT JOIN skills ON skills.member_id = members.id
                          WHERE members.id = :id
                          GROUP BY members.id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function searchMembers($term){
        $termLike = '%' . $term . '%';
        $this->db->query('SELECT members.*, teams.name as team_name, GROUP_CONCAT(DISTINCT skills.skill_name SEPARATOR ", ") as skills
                          FROM members
                          LEFT JOIN teams ON members.team_id = teams.id
                          LEFT JOIN skills ON skills.member_id = members.id
                          WHERE members.full_name LIKE :term OR members.major LIKE :term OR skills.skill_name LIKE :term
                          GROUP BY members.id
                          ORDER BY members.created_at DESC');
        $this->db->bind(':term', $termLike);
        return $this->db->resultSet();
    }

    public function updateMember($data){
        $this->db->query('UPDATE members SET full_name = :name, email = :email, phone = :phone, address = :address, team_id = :team_id, major = :major WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':team_id', $data['team_id']);
        $this->db->bind(':major', isset($data['major']) ? $data['major'] : null);

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
