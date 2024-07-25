import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                azulboost: '#006BF6',
            },
            fontWeight: {
                medium: "500",
                regular: "400",
                semibold: "600",
            },
            boxShadow: {
                DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.02)',
                md: '0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.02)',
                lg: '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)',
                xl: '0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.01)',
            },
            outline: {
                blue: '2px solid rgba(0, 112, 244, 0.5)',
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            fontSize: {
                xs: ['0.75rem', { lineHeight: '1.5' }],
                sm: ['0.875rem', { lineHeight: '1.5715' }],
                base: ['1rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
                lg: ['1.125rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
                xl: ['1.25rem', { lineHeight: '1.5', letterSpacing: '-0.01em' }],
                '2xl': ['1.5rem', { lineHeight: '1.33', letterSpacing: '-0.01em' }],
                '3xl': ['1.88rem', { lineHeight: '1.33', letterSpacing: '-0.01em' }],
                '4xl': ['2.25rem', { lineHeight: '1.25', letterSpacing: '-0.02em' }],
                '5xl': ['3rem', { lineHeight: '1.25', letterSpacing: '-0.02em' }],
                '6xl': ['3.75rem', { lineHeight: '1.2', letterSpacing: '-0.02em' }],
                mediumSize: "56px",
                regularSize: "18px",
                basicSize: "16px",
                basic: "14px",
                basicLittle: "12px",
                subtitle: "48px",
                littleTitle: "24px",
                middleTitle: "40px",
                middle: "32px",
                text12: "12px",
                text16: "16px",
            },

            backgroundColor: {
                colorBackgroundHeader: "#21201E",
                colorBackgroundMainTop: "#21201E",
                colorBackgroundProducts: "#F8F6F2",
                colorBackgroundNewProduct: "#38CB89",
                coloBkthirdJL: "#FFD632",
                coloBksecondJl: "#00bf63",
                coloBkprimJl: "#FF3131",
            },
            textColor: {
                colorSubtitle: "#113E55",
                colorSubtitleLittle: "#173525",
                colorAdd: "#2D694B",
                colorTextBlack: "#151515",
                colorJL: "#102E5B",
                color2JL: "#f93d3d",
                color3JL: "#05D370",
                color4JL: "#102E5BA3",
                
            },
            borderColor: {
                selectCheck: "#173525",
                colorBorder: "#151515",
            },

            backgroundImage: {
                "close-menu": "url(../images/prueba/icon-close.svg)",
                "open-menu": "url(../images/prueba/icon-hamburger.svg)",
            },

            screens: {
                xs: '320px',
                "2xs": "420px",
                sm: "640px",
                md: "768px",
                "2md": "980px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
            },
            borderWidth: {
                3: '3px',
            },
            minWidth: {
                36: '9rem',
                44: '11rem',
                56: '14rem',
                60: '15rem',
                72: '18rem',
                80: '20rem',
            },
            maxWidth: {
                '8xl': '88rem',
                '9xl': '96rem',
            },
            zIndex: {
                60: '60',
            },
            keyframes: {
                slideInFromBottom: {
                    '0%': { transform: 'translateY(100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideInFromLeft: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideInFromRight: {
                    '0%': { transform: 'translateX(100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
            },
            animation: {
                slideInFromBottom: 'slideInFromBottom 0.5s ease-out',
                slideInFromLeft: 'slideInFromLeft 0.5s ease-out forwards',
                slideInFromRight: 'slideInFromRight 0.5s ease-out forwards',
            },
            transform: {
                'zoom-in': 'scale(1.05)',
            },
            transitionProperty: {
                'transform': 'transform',
            },
        },
    },
    variants: {
        extend: {
            opacity: ['focus-within'],
        },
    },
    plugins: [
        forms,
        typography,
        // add custom variant for expanding sidebar
        plugin(({ addVariant, e }) => {
            addVariant('sidebar-expanded', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => `.sidebar-expanded .${e(`sidebar-expanded${separator}${className}`)}`);
            });
        }),

    ],
};
