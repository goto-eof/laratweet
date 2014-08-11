<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{


    protected $fillable = array('username', 'email', 'password', 'bio');
    use UserTrait, RemindableTrait;

    protected $table = 'Users';
    protected $hidden = array('password', 'remember_token');

    public static function getProfileByUsername($username)
    {
        return DB::select('SELECT id, username, password, email, image_uri, bio
                           FROM Users
                           WHERE id = (
                                        SELECT id
                                        FROM Users
                                        WHERE username
                                        LIKE ?
                                      )', array($username));
    }

    public static function getProfiles()
    {
        return DB::select('SELECT id, username, email, image_uri, bio
                           FROM Users
                           ORDER BY username ASC');
    }

    public static function getAllTweetsByUserId($userId)
    {
        return DB::select('SELECT Tweets.*, Users.username
                           FROM Tweets, Users
                           WHERE Users.id = ? AND
                                 Tweets.user_id = Users.id
                           ORDER BY Tweets.id DESC', array($userId));
    }

    public static function getAllTweetsByUsername($username)
    {
        return DB::select('SELECT Tweets.*, Users.username
                           FROM Tweets, Users
                           WHERE Users.username = ? AND
                                 Tweets.user_id = Users.id
                           ORDER BY Tweets.id DESC', array($username));
    }

    public static function followUsername($me, $other)
    {
        return DB::insert("INSERT INTO Followings (user_id, follows_user_id)
                            SELECT A.id, B.id
                            FROM Users A, Users B
                            WHERE lower(A.username) LIKE lower(?) AND
                                  lower(B.username) LIKE lower(?)", array($me, $other));
    }

    public static function unfollowUsername($me, $other)
    {
        return DB::delete('DELETE FROM Followings
                           WHERE user_id = (
                                            SELECT id
                                            FROM Users
                                            WHERE lower(username) LIKE lower(?)
                                            ) AND
                                 follows_user_id = (
                                            SELECT id
                                            FROM Users
                                            WHERE lower(username) LIKE lower(?)
                                                   )', array($me, $other));
    }

    public static function isFollowingUsername($usernameA, $usernameB)
    {
        return DB::select('SELECT COUNT(1) AS n
                           FROM Followings
                           WHERE user_id = (
                                            SELECT id
                                            FROM Users
                                            WHERE lower(username) Like lower(?)) AND
                                 follows_user_id = (
                                            SELECT id
                                            FROM Users
                                            WHERE lower(username) LIKE lower(?)
                                                    )', array($usernameA, $usernameB));
    }

    public static function getAllFriendsTweetsByUsername($myUsername)
    {
        return DB::select('SELECT t.*, u.username
                           FROM Tweets AS t, Users AS u
                           WHERE t.user_id = u.id AND
                                 t.user_id in (
                                                 SELECT follows_user_id
                                                 FROM Followings
                                                 WHERE user_id = (
                                                                  SELECT id FROM Users
                                                                  WHERE lower(username)
                                                                  LIKE lower(?)
                                                                 )
                                               )
                           ORDER BY t.created_at DESC

                                ', array($myUsername));
    }
}