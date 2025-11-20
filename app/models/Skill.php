<?php
class Skill extends Model {
    public function addSkills($member_id, $skills){
        // $skills expected as array of skill names
        if(empty($skills) || !is_array($skills)) return false;
        // Delete existing first
        $this->deleteSkillsByMember($member_id);
        $this->db->query('INSERT INTO skills (member_id, skill_name) VALUES ' . implode(',', array_fill(0, count($skills), '(?, ?)')));
        // build bindings manually since simple prepared placeholders used above with positional binds not supported by wrapper
        // We'll insert one-by-one instead to keep it simple and safe
        foreach($skills as $skill){
            $this->db->query('INSERT INTO skills (member_id, skill_name) VALUES(:member_id, :skill_name)');
            $this->db->bind(':member_id', $member_id);
            $this->db->bind(':skill_name', trim($skill));
            $this->db->execute();
        }
        return true;
    }

    public function getSkillsByMember($member_id){
        $this->db->query('SELECT skill_name FROM skills WHERE member_id = :member_id');
        $this->db->bind(':member_id', $member_id);
        return $this->db->resultSet();
    }

    public function deleteSkillsByMember($member_id){
        $this->db->query('DELETE FROM skills WHERE member_id = :member_id');
        $this->db->bind(':member_id', $member_id);
        return $this->db->execute();
    }
}
