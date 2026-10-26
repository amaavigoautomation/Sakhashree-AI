<style>
    :root{--sakh-ai-plum:#4a274e;--sakh-ai-plum-dark:#351638;--sakh-ai-gold:#c78c54;--sakh-ai-cream:#fdf8f4;--sakh-ai-ink:#342b35;--sakh-ai-muted:#796d79;--sakh-ai-line:#eee3d8}
    .sakh-ai-launcher{position:fixed;right:26px;bottom:26px;z-index:9998;width:76px;height:76px;border:0;border-radius:50%;padding:0;background:linear-gradient(145deg,#fff0df,#f3e1cc);box-shadow:0 8px 28px #30152c38;cursor:pointer;display:grid;place-items:center;transition:transform .2s ease,box-shadow .2s ease}
    .sakh-ai-launcher:hover{transform:translateY(-3px) scale(1.03);box-shadow:0 12px 32px #30152c48}.sakh-ai-launcher:focus-visible,.sakh-ai-send:focus-visible,.sakh-ai-close:focus-visible{outline:3px solid #c99a48;outline-offset:3px}
    .sakh-ai-launcher svg{width:65px;height:65px;filter:drop-shadow(0 2px 3px #6c34502a)}
    .sakh-ai-launcher-label{position:absolute;right:84px;white-space:nowrap;background:var(--sakh-ai-plum);color:#fffaf2;padding:8px 12px;border-radius:14px 14px 4px 14px;font:500 12px/1.2 Poppins,sans-serif;box-shadow:0 5px 18px #30152c20}
    .sakh-ai-panel{position:fixed;right:26px;bottom:116px;z-index:9999;width:min(390px,calc(100vw - 28px));height:min(620px,calc(100dvh - 145px));min-height:430px;display:none;flex-direction:column;overflow:hidden;border:1px solid #eadbc9;border-radius:24px;background:var(--sakh-ai-cream);box-shadow:0 20px 70px #28132938;font-family:Poppins,sans-serif;color:var(--sakh-ai-ink)}
    .sakh-ai-panel.is-open{display:flex;animation:sakhAiIn .2s ease-out}@keyframes sakhAiIn{from{opacity:0;transform:translateY(10px) scale(.985)}to{opacity:1;transform:translateY(0) scale(1)}}
    .sakh-ai-header{display:flex;align-items:center;gap:12px;padding:17px 17px 15px;background:linear-gradient(125deg,#4a274e,#793074);color:#fffaf2;position:relative}
    .sakh-ai-mini-chakra{width:45px;height:45px;flex:0 0 45px;border-radius:50%;background:#fff8e9;display:grid;place-items:center;box-shadow:inset 0 0 0 1px #d9b77a}
    .sakh-ai-mini-chakra svg{width:39px;height:39px}.sakh-ai-head-copy{min-width:0;flex:1}.sakh-ai-title{font:600 16px/1.35 'Roboto Serif',Georgia,serif;letter-spacing:.1px}.sakh-ai-subtitle{font:400 10px/1.6 Poppins,sans-serif;opacity:.84;margin-top:3px;letter-spacing:.2px}
    .sakh-ai-close{width:32px;height:32px;border:1px solid #ffffff45;border-radius:50%;background:#ffffff10;color:white;font-size:21px;line-height:1;cursor:pointer;display:grid;place-items:center}
    .sakh-ai-welcome{padding:14px 15px 10px;background:linear-gradient(180deg,#f7eee3,#fffaf2);border-bottom:1px solid var(--sakh-ai-line)}
    .sakh-ai-welcome-title{font:600 15px/1.45 'Roboto Serif',Georgia,serif;color:var(--sakh-ai-plum-dark);margin:0 0 4px}.sakh-ai-welcome p{font:400 11px/1.65 Poppins,sans-serif;color:var(--sakh-ai-muted);margin:0}
    .sakh-ai-chips{display:flex;gap:7px;flex-wrap:wrap;margin-top:11px}.sakh-ai-chip{border:1px solid #e4d1b8;background:#fffdf8;color:#63385c;border-radius:20px;padding:6px 10px;font:500 10px/1.3 Poppins,sans-serif;cursor:pointer;transition:background .15s ease}.sakh-ai-chip:hover{background:#f1e1cb}
    .sakh-ai-messages{flex:1;min-height:0;overflow:auto;padding:15px 13px 10px;display:flex;flex-direction:column;gap:11px;scroll-behavior:smooth;background:radial-gradient(ellipse at top right,#f8efe2 0,transparent 48%),var(--sakh-ai-cream)}
    .sakh-ai-message{max-width:88%;padding:10px 12px;border-radius:15px;font:400 12px/1.7 Poppins,sans-serif;white-space:pre-wrap;overflow-wrap:anywhere;box-shadow:0 2px 8px #4423400a}.sakh-ai-message.assistant{align-self:flex-start;background:#fff;border:1px solid #eee2d6;border-top-left-radius:5px;color:#403541}.sakh-ai-message.user{align-self:flex-end;background:var(--sakh-ai-plum);color:#fffaf2;border-top-right-radius:5px}.sakh-ai-message a{color:#8c5b21;text-decoration:underline;text-underline-offset:2px}.sakh-ai-message.user a{color:#ffe3a7}
    .sakh-ai-sources{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}.sakh-ai-source{display:inline-flex;align-items:center;gap:5px;padding:5px 8px;border-radius:9px;border:1px solid #e9d9c7;background:#fffaf3;color:#69445f;text-decoration:none;font-size:10px;line-height:1.4}.sakh-ai-source:hover{background:#f4e7d5}
    .sakh-ai-typing{display:none;align-self:flex-start;padding:10px 13px;border:1px solid #eee2d6;border-radius:15px 15px 15px 5px;background:#fff;color:#806a7b;font-size:11px}.sakh-ai-typing.show{display:block}.sakh-ai-typing span{display:inline-block;width:5px;height:5px;margin:0 2px;border-radius:50%;background:#b38aaf;animation:sakhAiDot 1s infinite ease-in-out}.sakh-ai-typing span:nth-child(2){animation-delay:.15s}.sakh-ai-typing span:nth-child(3){animation-delay:.3s}@keyframes sakhAiDot{0%,60%,100%{transform:translateY(0);opacity:.5}30%{transform:translateY(-4px);opacity:1}}
    .sakh-ai-composer{padding:10px 11px 8px;background:#fffdf9;border-top:1px solid var(--sakh-ai-line)}.sakh-ai-form{display:flex;align-items:flex-end;gap:8px;padding:6px 6px 6px 12px;border:1px solid #e4d4c5;border-radius:17px;background:#fff;box-shadow:0 2px 7px #44234006}.sakh-ai-input{flex:1;min-width:0;max-height:90px;resize:none;border:0!important;outline:none!important;box-shadow:none!important;background:transparent!important;padding:7px 0!important;color:#342b35!important;font:400 12px/1.5 Poppins,sans-serif!important}.sakh-ai-input::placeholder{color:#9b8d9a}.sakh-ai-send{width:35px;height:35px;flex:0 0 35px;border:0;border-radius:12px;background:var(--sakh-ai-plum);color:#fff8ed;cursor:pointer;display:grid;place-items:center;transition:background .15s}.sakh-ai-send:hover{background:#743a69}.sakh-ai-send:disabled{opacity:.45;cursor:wait}.sakh-ai-send svg{width:17px;height:17px}.sakh-ai-disclaimer{text-align:center;color:#9a8d98;font:400 9px/1.5 Poppins,sans-serif;padding:7px 5px 0}.sakh-ai-error{color:#8e493f;font-size:11px;padding:4px 2px}
    @media(max-width:480px){.sakh-ai-launcher{right:16px;bottom:16px;width:66px;height:66px}.sakh-ai-launcher svg{width:57px;height:57px}.sakh-ai-launcher-label{right:74px}.sakh-ai-panel{right:8px;bottom:91px;width:calc(100vw - 16px);height:min(690px,calc(100dvh - 108px));min-height:400px;border-radius:21px}.sakh-ai-header{padding:14px}.sakh-ai-welcome{padding:12px}.sakh-ai-messages{padding:12px 10px}}
    @media(prefers-reduced-motion:reduce){.sakh-ai-panel.is-open{animation:none}.sakh-ai-launcher{transition:none}.sakh-ai-messages{scroll-behavior:auto}}
</style>

<button class="sakh-ai-launcher" id="sakhAiLauncher" type="button" aria-label="Open Sakhashree AI Guide" aria-expanded="false" aria-controls="sakhAiPanel" title="Ask Sakhashree AI Guide">
    <span class="sakh-ai-launcher-label">Ask Sakhashree</span>
    <svg viewBox="0 0 100 100" role="img" aria-label="Seven-colour chakra flower">
        <defs><radialGradient id="sakhAiCore"><stop offset="0" stop-color="#fff8e6"/><stop offset=".72" stop-color="#e4c58c"/><stop offset="1" stop-color="#a87939"/></radialGradient></defs>
        <circle cx="50" cy="50" r="47" fill="#fffaf0" stroke="#d5b578" stroke-width="1.5"/>
        <g transform="translate(50 50)" stroke="#fffaf0" stroke-width="1.1">
            <ellipse cx="0" cy="-20" rx="11" ry="23" fill="#7b3d9c" transform="rotate(0)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#315fc5" transform="rotate(51.43)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#36a7b7" transform="rotate(102.86)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#4e9b57" transform="rotate(154.29)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#e5c54e" transform="rotate(205.72)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#ed873d" transform="rotate(257.15)"/><ellipse cx="0" cy="-20" rx="11" ry="23" fill="#c74753" transform="rotate(308.58)"/>
        </g><circle cx="50" cy="50" r="12" fill="url(#sakhAiCore)" stroke="#fff7e7" stroke-width="2"/><circle cx="50" cy="50" r="4" fill="#fffaf0"/>
    </svg>
</button>

<section class="sakh-ai-panel" id="sakhAiPanel" role="dialog" aria-modal="false" aria-label="Sakhashree AI Guide chat">
    <header class="sakh-ai-header">
        <div class="sakh-ai-mini-chakra" aria-hidden="true">
            <svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="47" fill="#fff8e9" stroke="#d5b578" stroke-width="2"/><g transform="translate(50 50)" stroke="#fffaf0" stroke-width="1.2"><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#7b3d9c"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#315fc5" transform="rotate(51.43)"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#36a7b7" transform="rotate(102.86)"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#4e9b57" transform="rotate(154.29)"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#e5c54e" transform="rotate(205.72)"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#ed873d" transform="rotate(257.15)"/><ellipse cx="0" cy="-20" rx="12" ry="24" fill="#c74753" transform="rotate(308.58)"/></g><circle cx="50" cy="50" r="12" fill="#d6b678"/><circle cx="50" cy="50" r="5" fill="#fffaf0"/></svg>
        </div>
        <div class="sakh-ai-head-copy"><div class="sakh-ai-title">Sakhashree AI Guide</div><div class="sakh-ai-subtitle">A gentle guide for your inner journey</div></div>
        <button class="sakh-ai-close" id="sakhAiClose" type="button" aria-label="Close chat">×</button>
    </header>
    <div class="sakh-ai-welcome" id="sakhAiWelcome">
        <h3 class="sakh-ai-welcome-title">Namaste, welcome 🌼</h3>
        <p>I'm here to help you explore Sakhashree's chakra wisdom, spiritual offerings and resources. What would you like to discover?</p>
        <div class="sakh-ai-chips">
            <button type="button" class="sakh-ai-chip" data-prompt="Can you explain the seven chakras?">Explore the chakras</button>
            <button type="button" class="sakh-ai-chip" data-prompt="What consultations and spiritual guidance does Sakhashree offer?">Explore consultations</button>
            <button type="button" class="sakh-ai-chip" data-prompt="Show me workshops and upcoming events listed on the website.">Workshops & events</button>
            <button type="button" class="sakh-ai-chip" data-prompt="Recommend relevant articles and FAQs for someone beginning a spiritual journey.">Find resources</button>
        </div>
    </div>
    <div class="sakh-ai-messages" id="sakhAiMessages" aria-live="polite" aria-label="Chat messages">
        <div class="sakh-ai-message assistant">You can ask me about the information available on this website. I'll share relevant pages and resources whenever I can.</div>
    </div>
    <div class="sakh-ai-typing" id="sakhAiTyping" aria-label="Sakhashree AI Guide is responding"><span></span><span></span><span></span> Gathering a thoughtful response…</div>
    <div class="sakh-ai-composer">
        <form class="sakh-ai-form" id="sakhAiForm">
            <textarea class="sakh-ai-input" id="sakhAiInput" rows="1" maxlength="1200" placeholder="Ask about chakras, services, resources…" aria-label="Your message"></textarea>
            <button class="sakh-ai-send" id="sakhAiSend" type="submit" aria-label="Send message">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            </button>
        </form>
        <div class="sakh-ai-disclaimer">AI-generated guidance based on website content · Not medical advice</div>
    </div>
</section>

<script>
(function(){
    const launcher=document.getElementById('sakhAiLauncher');
    const panel=document.getElementById('sakhAiPanel');
    const close=document.getElementById('sakhAiClose');
    const form=document.getElementById('sakhAiForm');
    const input=document.getElementById('sakhAiInput');
    const send=document.getElementById('sakhAiSend');
    const messages=document.getElementById('sakhAiMessages');
    const typing=document.getElementById('sakhAiTyping');
    const welcome=document.getElementById('sakhAiWelcome');
    const endpoint=@json(route('ai-guide.chat'));
    let history=[];
    let conversationSummary='';
    let busy=false;

    function toggle(open){panel.classList.toggle('is-open',open);launcher.setAttribute('aria-expanded',String(open));launcher.setAttribute('aria-label',open?'Close Sakhashree AI Guide':'Open Sakhashree AI Guide');if(open){setTimeout(()=>input.focus(),80);messages.scrollTop=messages.scrollHeight}else launcher.focus()}
    launcher.addEventListener('click',()=>toggle(!panel.classList.contains('is-open')));
    close.addEventListener('click',()=>toggle(false));
    document.addEventListener('keydown',e=>{if(e.key==='Escape'&&panel.classList.contains('is-open'))toggle(false)});

    function safeLink(url){try{const parsed=new URL(url,window.location.origin);return (parsed.protocol==='https:'||parsed.protocol==='http:')?parsed.href:null}catch(e){return null}}
    function appendMessage(role,text,sources=[]){
        const bubble=document.createElement('div');bubble.className='sakh-ai-message '+role;
        // Render plain text safely; only explicit source links are interactive.
        bubble.textContent=text;
        if(sources.length&&role==='assistant'){
            const wrap=document.createElement('div');wrap.className='sakh-ai-sources';
            sources.forEach(source=>{const href=safeLink(source.url);if(!href)return;const a=document.createElement('a');a.className='sakh-ai-source';a.href=href;a.target='_blank';a.rel='noopener noreferrer';a.textContent='↗ '+(source.title||'Read more');wrap.appendChild(a)});
            if(wrap.childElementCount)bubble.appendChild(wrap);
        }
        messages.appendChild(bubble);messages.scrollTop=messages.scrollHeight;return bubble;
    }
    function resizeInput(){input.style.height='auto';input.style.height=Math.min(input.scrollHeight,90)+'px'}
    input.addEventListener('input',resizeInput);
    async function submitMessage(text){
        text=(text||'').trim();if(!text||busy)return;
        welcome.style.display='none';appendMessage('user',text);history.push({role:'user',content:text});
        if(history.length>10)history=history.slice(-10);
        input.value='';resizeInput();busy=true;send.disabled=true;typing.classList.add('show');messages.scrollTop=messages.scrollHeight;
        try{
            const response=await fetch(endpoint,{method:'POST',headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]')?.content||''},body:JSON.stringify({message:text,history:history.slice(0,-1),conversation_summary:conversationSummary})});
            const data=await response.json().catch(()=>({}));
            if(!response.ok)throw new Error(data.message||'The guide is temporarily unavailable. Please try again.');
            const answer=String(data.message||'I could not prepare an answer just now.');appendMessage('assistant',answer,data.sources||[]);history.push({role:'assistant',content:answer});if(typeof data.conversation_summary==='string')conversationSummary=data.conversation_summary;if(history.length>10)history=history.slice(-10);if(data.conversation_ending===true){history=[];conversationSummary='';}
        }catch(error){const errorMessage=error.message||'Something went wrong. Please try again shortly.';appendMessage('assistant',errorMessage);history.push({role:'assistant',content:errorMessage});if(history.length>10)history=history.slice(-10);}
        finally{busy=false;send.disabled=false;typing.classList.remove('show');input.focus();messages.scrollTop=messages.scrollHeight}
    }
    form.addEventListener('submit',e=>{e.preventDefault();submitMessage(input.value)});
    document.querySelectorAll('.sakh-ai-chip').forEach(chip=>chip.addEventListener('click',()=>submitMessage(chip.dataset.prompt||'')));
})();
</script>
