<?php
	
	namespace App\Http\Livewire;
	
	use Livewire\Component;
	use Livewire\WithFileUploads;
	
	class FileUpload extends Component {
		use WithFileUploads;
		
		public $video;
		
		public function uploadVideo() {
			$this->validate([
				'video' => [
					'required',
					'file',
					'mimes:avi,mp4,webm,mov,ogg,mkv,flv,m3u8,ts,3gp,wmv,3g2,m4v',
					'max:102400'
				],
			]);
			
			cloudinary()->upload($this->video->getRealPath(), [
				'folder'           => 'video-mod',
				'resource_type'    => 'video',
				'moderation'       => 'google_video_moderation:possible',
				'notification_url' => env('CLOUDINARY_NOTIFICATION_URL')
			]);
			
			session()->flash('message', "Video moderation initiated successfully!");
		}
		
		public function render() {
			return view('livewire.file-upload');
		}
	}
