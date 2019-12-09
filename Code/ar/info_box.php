<section class="info card"
:style='{ backgroundColor : S.timeline[S.timeline_cnt].info_box.bg_color }'
v-if='S.show_ui == "info"'>
    <p class="phase">
        <span class="now">{{ S.timeline_cnt+1 }}</span>
        <span class="total">{{ S.timeline.length }}</span>
    </p>
    <video id='info_video'
    :src='set_info_video(S.timeline[S.timeline_cnt].info_box.video.start,S.timeline[S.timeline_cnt].info_box.video.end)'
    muted autoplay loop preload='auto' playsinline></video>
    <div>
        <p
        class="msgs"
        :style='{ textAlign : S.timeline[S.timeline_cnt].info_box.msgs[S.info_box_msgs_cnt].align }'
        v-html='S.timeline[S.timeline_cnt].info_box.msgs[S.info_box_msgs_cnt].text'></p>
        <button
        @click='[
        S.show_ui = "ar"
        ]'
        >{{ S.timeline[S.timeline_cnt].info_box.btn }}</button>
    </div>
</section>