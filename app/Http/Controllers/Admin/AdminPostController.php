<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{

    public function delete($id)
    {
        $deletedPost = DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect()->route('controler');
    }

    public function update($id)
    {
        Gate::authorize('admin');
        request()->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'resume' => 'required',
        ]);
        $img = $_FILES['imageEntete'];
        $imageUrl = '';
        if($img['name'] != '')
        {
            $imageUrl = $this->uploadImage($_FILES['imageEntete']);
        }
        $post = DB::table('posts')
            ->where('id', $id)
            ->update([
                'titre' => request('titre'),
                'resume' => request('resume'),
                'contenu' => request('contenu'),
                'url_image_entete' => $imageUrl,
            ]);

        return redirect()->route('modifier-post', ['id' => $id])->with('succes', 'Post modifié');
    }

    public function create(Request $request)
    {
        Gate::authorize('admin');
        request()->validate([
            'titre' => 'required',
            'resume' => 'required',
            'contenu' => 'required',
        ]);

        $post = new Post();
        $post->titre = request('titre');
        $post->slug = $this->slugify(request('titre'));
        $post->resume = request('resume');
        $post->contenu = request('contenu');
        $post->user_id = Auth::user()->id;
        $post->date_publication = date('Y-m-d H:i:s');
        $img = $_FILES['imageEntete'];
        $imageUrl = '';
        if($img['name'] != '') 
        {
            $this->uploadImage($_FILES['imageEntete']);
        }
        $post->url_image_entete = $imageUrl;
        $post->save();

        return redirect()->route('poster')
            ->with('succes', 'Blog posté');

    }

    private function uploadImage($img)
    {   
        $filename = $img['tmp_name'];
        $client_id = "568627ec0baee73";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close($curl);
        $pms = json_decode($out, true);
        $url = $pms['data']['link'];
        if ($url != "") {
            return $url;
        } else {
        }
    }

    private function slugify($str)
    {
        // Convert to lowercase and remove whitespace
        $str = strtolower(trim($str));

        // Replace high ascii characters
        $chars = array("ä", "ö", "ü", "ß");
        $replacements = array("ae", "oe", "ue", "ss");
        $str = str_replace($chars, $replacements, $str);
        $pattern = array("/(é|è|ë|ê)/", "/(ó|ò|ö|ô)/", "/(ú|ù|ü|û)/");
        $replacements = array("e", "o", "u");
        $str = preg_replace($pattern, $replacements, $str);

        // Remove puncuation
        $pattern = array(":", "!", "?", ".", "/", "'");
        $str = str_replace($pattern, "", $str);

        // Hyphenate any non alphanumeric characters
        $pattern = array("/[^a-z0-9-]/", "/-+/");
        $str = preg_replace($pattern, "-", $str);

        return $str;
    }
}
