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

    public function registerParticipant($event_id, $member_id){
        // ensures unique because of unique constraint
        $this->db->query('INSERT INTO event_participants (event_id, member_id) VALUES(:event_id, :member_id)');
        $this->db->bind(':event_id', $event_id);
        $this->db->bind(':member_id', $member_id);
        try{
            return $this->db->execute();
        } catch(Exception $e){
            return false;
        }
    }

    public function getParticipants($event_id){
        $this->db->query('SELECT ep.*, m.full_name, m.email, m.phone FROM event_participants ep JOIN members m ON ep.member_id = m.id WHERE ep.event_id = :event_id');
        $this->db->bind(':event_id', $event_id);
        return $this->db->resultSet();
    }

    public function setAttendance($event_id, $member_id, $attended = 1){
        $this->db->query('UPDATE event_participants SET attended = :attended WHERE event_id = :event_id AND member_id = :member_id');
        $this->db->bind(':attended', $attended);
        $this->db->bind(':event_id', $event_id);
        $this->db->bind(':member_id', $member_id);
        return $this->db->execute();
    }
}
