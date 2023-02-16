<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class AddUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = "https://www.fxp.co.il/register.php";
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        $response = curl_exec($ch);

        $hashed_password = md5($this->user->password);
    
        $data = [
            'username' => $this->user->username,
            'email' => $this->user->email,
            'agree' => '1',
            'securitytoken' => 'guest',
            'do' => 'addmember',
            'url' => 'https://www.fxp.co.il/loginpage.php',
            'password_md5' => $hashed_password,
            'passwordconfirm_md5' => $hashed_password
        ];
            
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
        $result = curl_exec($ch);

        //$this->user->save();
    }
}
