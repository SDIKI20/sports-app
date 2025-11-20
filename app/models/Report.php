<?php
class Report extends Model {
    // Top skills (skill_name, count)
    public function getTopSkills($limit = 10){
        $this->db->query('SELECT skill_name, COUNT(*) as cnt FROM skills GROUP BY skill_name ORDER BY cnt DESC LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Distribution of members by major/field
    public function getMajorDistribution(){
        $this->db->query('SELECT COALESCE(major, "Unspecified") as major, COUNT(*) as cnt FROM members GROUP BY major ORDER BY cnt DESC');
        return $this->db->resultSet();
    }

    // Percentage of members with at least one paid subscription
    public function getPaidMembersStats(){
        $this->db->query('SELECT COUNT(DISTINCT member_id) as paid_count FROM subscriptions WHERE status = "paid"');
        $paid = $this->db->single();
        $this->db->query('SELECT COUNT(*) as total FROM members');
        $total = $this->db->single();
        $paid_count = $paid ? $paid->paid_count : 0;
        $total_count = $total ? $total->total : 0;
        $percent = $total_count > 0 ? round(($paid_count / $total_count) * 100, 2) : 0;
        return ['paid' => (int)$paid_count, 'total' => (int)$total_count, 'percent' => $percent];
    }

    // Most popular events by participants
    public function getTopEvents($limit = 10){
        $this->db->query('SELECT e.id, e.event_name, COUNT(ep.id) as participants FROM events e LEFT JOIN event_participants ep ON e.id = ep.event_id GROUP BY e.id ORDER BY participants DESC LIMIT :limit');
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Subscriptions sums by month (YYYY-MM)
    public function getSubscriptionsOverTime(){
        $this->db->query("SELECT DATE_FORMAT(date, '%Y-%m') as month, SUM(amount) as total FROM subscriptions GROUP BY month ORDER BY month ASC");
        return $this->db->resultSet();
    }

    // Search members by a specific skill
    public function searchMembersBySkill($skill){
        $this->db->query('SELECT m.* FROM members m JOIN skills s ON m.id = s.member_id WHERE s.skill_name LIKE :skill GROUP BY m.id');
        $this->db->bind(':skill', '%' . $skill . '%');
        return $this->db->resultSet();
    }
}
