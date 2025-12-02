/**
 * index.js - Script Principal Tullani Estética
 * Foco: Simplificação do Agendamento (Remoção de Formulário e Redirecionamento Direto para WhatsApp)
 * e Correção dos Swipers.
 */

document.addEventListener("DOMContentLoaded", function() {

    // Número de WhatsApp e mensagem padrão (sem dados de formulário)
    const WHATSAPP_NUMBER = "5511986007017"; 
    const DEFAULT_MESSAGE = "Olá! Gostaria de saber mais sobre as promoções e agendar um horário.";
    const WHATSAPP_LINK = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(DEFAULT_MESSAGE)}`;

    // =========================================================================
    // 1. LÓGICA DO NAVBAR (Fechar menu mobile ao clicar nos links)
    // =========================================================================
    const navCollapse = document.getElementById('navbarNav');
    const navLinks = navCollapse ? navCollapse.querySelectorAll('.nav-link') : [];

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (navCollapse && navCollapse.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(navCollapse) || new bootstrap.Collapse(navCollapse, { toggle: false });
                bsCollapse.hide();
            }
        });
    });

    // =========================================================================
    // 2. MODAL DE INÍCIO & BOTÕES DE AGENDAMENTO (REDIRECIONAMENTO DIRETO)
    // =========================================================================
    const popupElement = document.getElementById("popupInicio");
    let popupInstance = null;

    if (popupElement) {
        // Cria a instância do modal do Bootstrap (ainda necessário se o modal for exibido)
        popupInstance = new bootstrap.Modal(popupElement);
        
        // A) Abre automaticamente ao carregar a página (AÇÃO PRINCIPAL)
        // Se você não quer que abra, comente a linha abaixo.
        // popupInstance.show(); 

        // B) Configura TODOS os botões "Agendar Agora" para abrirem o link do WhatsApp.
        const botoesAgendar = document.querySelectorAll(".btn-agendar, #btnav, #btnpromo, #btnsection, #btnpopup, #btnwhats");
        
        botoesAgendar.forEach(botao => {
            botao.addEventListener("click", (e) => {
                e.preventDefault(); 
                // Fecha o modal se estiver aberto antes de redirecionar
                if(popupInstance) popupInstance.hide(); 
                
                // Redirecionamento direto para o WhatsApp
                window.open(WHATSAPP_LINK, "_blank");
            });
        });
    }

    // =========================================================================
    // 3. REMOÇÃO DA LÓGICA DO FORMULÁRIO (Simplificação do Fluxo)
    //    O código do formulário foi removido para implementar o redirecionamento direto acima.
    // =========================================================================

    // =========================================================================
    // 4. CONFIGURAÇÃO DOS SWIPERS (Carrosséis)
    // =========================================================================

    const initSwiper = (selector, config) => {
        if (document.querySelector(selector)) {
            try {
                new Swiper(selector, config);
            } catch (e) {
                console.error(`Erro ao inicializar Swiper para ${selector}:`, e);
            }
        }
    };

    // Swiper Avaliação / Cuidados (Loop de slides, conforme solicitado)
    initSwiper(".avaliacaoSwiper", {
        loop: true, 
        slidesPerView: 3, 
        spaceBetween: 30, 
        speed: 600, 
        grabCursor: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        breakpoints: { 0: { slidesPerView: 1, spaceBetween: 10 }, 576: { slidesPerView: 2, spaceBetween: 20 }, 992: { slidesPerView: 3, spaceBetween: 30 } },
    });

    // Swiper Promoção (Carrossel padrão em loop, sem efeito 'cards')
    initSwiper(".promoSwiper", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 20,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        }
    });


    // Swiper Feedback/Depoimentos (Autoplay contínuo)
    initSwiper(".mySwiper", {
        loop: true, slidesPerView: 3, spaceBetween: 30, speed: 3000, allowTouchMove: true,
        autoplay: { delay: 0, disableOnInteraction: false },
        breakpoints: { 0: { slidesPerView: 1 }, 576: { slidesPerView: 2 }, 992: { slidesPerView: 3 } },
    });

    // Swiper Vídeos (Coverflow)
    initSwiper(".videoSwiper", {
        effect: "coverflow", grabCursor: true, centeredSlides: true, slidesPerView: "auto",
        coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: true },
        pagination: { el: ".swiper-pagination", clickable: true },
    });

});