<?php
class Subscription extends Model {
    public function getSubscriptions(){
        $this->db->query('SELECT subscriptions.*, members.full_name 
                          FROM subscriptions 
                          JOIN members ON subscriptions.member_id = members.id 
                          ORDER BY subscriptions.date DESC');
        return $this->db->resultSet();
    }

    public function getTotalIncome(){
        $this->db->query('SELECT SUM(amount) as total FROM subscriptions WHERE status = "paid"');
        $row = $this->db->single();
        return $row->total ?? 0;
    }

    public function addSubscription($data){
        $this->db->query('INSERT INTO subscriptions (member_id, amount, date, status, type) VALUES(:member_id, :amount, :date, :status, :type)');
        $this->db->bind(':member_id', $data['member_id']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':type', $data['type']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
