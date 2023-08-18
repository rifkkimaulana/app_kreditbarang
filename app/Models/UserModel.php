<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_nama', 'user_username', 'user_password', 'user_level', 'email', 'no_wa', 'reset_token'];

    public function getByEmailOrUsername($value)
    {
        return $this->where('user_username', $value)
            ->orWhere('email', $value)
            ->first();
    }

    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updateResetToken($email, $token, $noWa)
    {
        $tokenWa = "yb2BtD05MDyIadY9u0FJjztE37yJqmPcZnATxbQxES6st523xa85S0t1wvdWFnFT";
        $link_server = "https://kudus.wablas.com/api/send-message";

        $recoveryURL = base_url() . '/auth?code=' . $tokenWa;
        $message = "Permintaan reset password diterima. Klik link berikut: $recoveryURL";

        $curl = curl_init();

        $data = [
            'phone' => $noWa,
            'message' => $message,
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: $tokenWa",
        ]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, $link_server);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($result, true);

        //$device_id = $response['data']['device_id'];
        //$pesan = $data['message'];
        //$status = $response['data']['messages'][0]['status'];
        $id_pesan = $response['data']['messages'][0]['id'];

        $this->set([
            'reset_token' => $token,
            'reset_id' => $id_pesan
        ])
            ->where('email', $email)
            ->update();
    }

    public function updateUserProfile($userId, $data)
    {
        if (isset($data['user_password']) && !empty($data['user_password'])) {
            $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
        } else {
            unset($data['user_password']);
        }

        $this->where('user_id', $userId)
            ->set($data)
            ->update();
    }
}
