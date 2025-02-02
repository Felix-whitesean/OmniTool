<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_name',
        'project_title',
        'project_details',
        'project_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            // Concatenating project_id, user_id, project_name, and timestamp
            $raw_string = "{$project->id}-{$project->user_id}-{$project->project_name}-".time();
        
            // Encode using Base64
            $encoded = base64_encode($raw_string);
            $encoded = str_replace(['+', '/', '='], '', $encoded); // Make it URL-safe
        
            // Set project_id as the first 8 characters of the encoded string
            $project->project_id = strtoupper(substr($encoded, 0, 8));
        
            // Ensure uniqueness of project_secret
            do {
                $randomString = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 3);
            } while (\App\Models\Project::where('project_secret', $randomString)->exists());
        
            // Store the unique random string
            $ps = base64_encode($randomString);
            $project->project_secret = str_replace(['+', '/', '='], '', $ps);
            $project->project_id = strtoupper($randomString.substr($encoded, 0, 8));
        });
        
        // static::creating(function ($project) {
        //     // Concatenating project_name, project_title, and timestamp
        //     $raw_string =  "{$project->id}-{$project->user_id}-{$project->project_name}-".time();
            
        //     // Encode using Base64
        //     $encoded = base64_encode($raw_string);
        //     $encoded = str_replace(['+', '/', '='], '', $encoded); // Remove special characters to makeit make it URL-safe

        //     // Set project_id as the first 8 characters of the encoded string
        //     $project->project_id = strtoupper(substr($encoded, 0, 8));
        // });
        // static::creating(function ($project) {
        //     $id = "{$project->id}" ?? rand(10000, 99999); // Use ID if available, otherwise random number
        //     $projectNamePart = substr(preg_replace('/\s+/', '', "{$project->project_name}"), 0, 5); // Remove spaces and take first 5 letters
        //     $userId = "{$project->user_id}" ?? rand(100, 999); // Use authenticated user or a random fallback

        //     return strtoupper(base64_encode("$id-$projectNamePart-$userId"));
        // });
    }
}

