<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Helpers\Helper;
use Carbon\Carbon;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','device_type','login_by',
        'picture','is_activated', 'timezone', 'verification_code' , 
        'verification_code_expiry', 'role', 'paypal', 'paypal_agreement_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userPlaylists()
    {
        return $this->belongsToMany('App\AdminVideo');
    }

    public function paymentPlans()
    {
        return $this->belongsToMany('App\PaymentPlan');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function userHistory()
    {
        return $this->hasMany('App\UserHistory');
    }

    public function userRating()
    {
        return $this->hasMany('App\UserRating');
    }

    public function userWishlist()
    {
        return $this->hasMany('App\Wishlist');
    }

    public function userPayment()
    {
        return $this->hasMany('App\UserPayment');
    }

    /**
     * Get the flag record associated with the user.
     */
    public function userFlag()
    {
        return $this->hasMany('App\Flag', 'user_id', 'id');
    }

    /**
     * Get the pay per view record associated with the user.
     */
    public function userVideoSubscription()
    {
        return $this->hasMany('App\PayPerView', 'user_id', 'id');
    }

     /**
     * Boot function for using with User Events
     *
     * @return void
     */

    public static function boot()
    {
        //execute the parent's boot method 
        parent::boot();

        //delete your related models here, for example
        static::deleting(function($user)
        {
            if (count($user->userHistory) > 0) {

                foreach($user->userHistory as $history)
                {
                    $history->delete();
                } 

            }

            if (count($user->userRating) > 0) {

                foreach($user->userRating as $rating)
                {
                    $rating->delete();
                } 

            }

            if (count($user->userWishlist) > 0) {

                foreach($user->userWishlist as $wishlist)
                {
                    $wishlist->delete();
                } 

            }

            if (count($user->userFlag) > 0) {

                foreach($user->userFlag as $flag)
                {
                    $flag->delete();
                }

            }

            if (count($user->userVideoSubscription) > 0) {

                foreach($user->userVideoSubscription as $video)
                {
                    $video->delete();
                }
            }

            if (count($user->userPayment) > 0) {

                foreach($user->userPayment as $payment)
                {
                    $payment->delete();
                } 
            }
        }); 

        static::creating(function ($model) {

            $model->generateEmailCode();

        });
    }
    
    /**
     * Check if user is verified
     * 
     * @return type
     */
    public function isVerified() {
        return $this->attributes['is_verified'] === "1" ? true : false;
    }
    
    /**
     * Get user payments and check if there is valid one
     * 
     * @param \App\User $user
     * @return boolean
     */
    public function userPaymentExpieryDateValid (User $user) {
        $return = false;
        $now = Carbon::now();
        
        foreach ($user->userPayment->all() as $userPayment) {
            $expiry_date = Carbon::parse($userPayment->expiry_date);
            if ($expiry_date->diffInSeconds($now) > 0) {
                $return = true;
            }
        }

        return $return;
    }


    /**
     * Generates Token and Token Expiry
     * 
     * @return bool returns true if successful. false on failure.
     */

    protected function generateEmailCode() {

        $this->attributes['verification_code'] = Helper::generate_email_code();

        $this->attributes['verification_code_expiry'] = Helper::generate_email_expiry();

        $this->attributes['is_verified'] = 0;

        return true;
    }

}
