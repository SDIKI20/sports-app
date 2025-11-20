<?php
class Event extends Model {
    public function getEvents(){
        $this->db->query('SELECT * FROM events ORDER BY event_date ASC');
        return $this->db->resultSet();
    }

    public function getEventCount(){
        $this->db->query('SELECT COUNT(*) as count FROM events');
        $row = $this->db->single();
        return $row->count;
    }

    public function addEvent($data){
        $this->db->query('INSERT INTO events (event_name, event_date, location, type, description) VALUES(:name, :date, :location, :type, :description)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':description', $data['description']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
