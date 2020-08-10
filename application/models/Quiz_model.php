<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends CI_Model {
protected $Submit_table_name = "submissions";
  protected $User_table_name = "questions";

			public function getQuestions()
			{
							try {

									$this->db->select('*');
							     $this->db->order_by('rand()');
							     $this->db->from($this->User_table_name);
                   $this->db->limit(5);
							     $query = $this->db->get();
                   return $query->result();
						//	return $query->result_array();

							} catch (\Exception $e) {
							    return ['status' => FALSE,'data' => $e." There is no data in the database"];
							}

			}
      function getQuestionsbyid($id){

                 $this->db->where("student_id", $id);
                     $this->db->from($this->Submit_table_name);
                    $q = $this->db->get();

                    $final = array();
                    if ($q->num_rows() > 0) {
                        foreach ($q->result() as $row) {
                              $this->db->select("*");
                          		     $this->db->from($this->User_table_name);
                               $this->db->where("id", $row->qid);
                                  $q = $this->db->get();
                            if ($q->num_rows() > 0) {
                                $row->children = $q->result();
                            }
                            array_push($final, $row);
                        }
                    }
                //   echo "<pre>"; print_r($final) ; echo "</pre>";
                     return $final;
           }



      public function multisave($userData) {
          return $this->db->insert($this->Submit_table_name, $userData);
      }


      function checklist($id)
      {

               $this->db->select("student_id");
                   $this->db->from($this->Submit_table_name);
                     $this->db->where("student_id", $id);
                        $result = $this->db->count_all_results();
                        if($result > 0)
                        {
                          return [
                              "status"=>TRUE,
                              "data" =>$result,
                            ];
                        }
                        else {
                      return ['status' => FALSE,'data' =>" There is no data in the database"];
                        }

      }

      function update($student_id,$data)
      {
       $datacount= count($data);
          for ($x=0; $x <$datacount; $x++) {
            $this->db->where('student_id',$student_id);
            $this->db->update($this->Submit_table_name, $data);
          }
      //   	 echo "<pre>"; print_r($data) ; echo "</pre>";

//       foreach ($data as $id => $v)
//       {
// //var_dump($v);
//       //   echo "<pre>"; print_r($v) ; echo "</pre>";
//         //  $this->db->update('photos',$v,array('photo_id' => $id);
//           // $this->db->where('student_id',$student_id);
//           // $this->db->update($this->Submit_table_name, $data);
//       }
//

              return true;

      }

      function delete_records($id){
          $this->db->where('student_id',$id);
  $this->db->delete($this->Submit_table_name);
  return $this->db->affected_rows() > 0 ? true:false;

            // $ids = $this->input->post('user_id');
            // $c = count($ids);
            // for($i=0; $i < $c; $i++){
            //     $user_id = $ids[$i];
            //     $this->db
            //             ->where('user_id',$user_id)
            //             ->delete('tbl_user');
            // }

            }

}
