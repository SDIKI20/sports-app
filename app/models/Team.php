<?php
class Team extends Model {
    public function getTeams(){
        $this->db->query('SELECT * FROM teams ORDER BY name ASC');
        return $this->db->resultSet();
    }

    public function getTeamCount(){
        $this->db->query('SELECT COUNT(*) as count FROM teams');
        $row = $this->db->single();
        return $row->count;
    }

    public function addTeam($data){
        $this->db->query('INSERT INTO teams (name, coach, category) VALUES(:name, :coach, :category)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':coach', $data['coach']);
        $this->db->bind(':category', $data['category']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
