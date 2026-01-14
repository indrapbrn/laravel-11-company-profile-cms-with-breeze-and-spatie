const videoFrame = document.getElementById('videoFrame');
const targetEl = document.getElementById('video-modal');
const pathVideo = document.getElementById('path_video').value;

const options = {
    placement: 'center',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900/50 fixed inset-0 z-40',
    closable: true,

    onShow: () => {
        videoFrame.src =
          `https://www.youtube.com/embed/${pathVideo}?autoplay=1&mute=1`;
    },

    onHide: () => {
        videoFrame.src = "";
    },
};

const modal = new Modal(targetEl, options);
