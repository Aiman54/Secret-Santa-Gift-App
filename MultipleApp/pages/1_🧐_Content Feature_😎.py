import streamlit as st
import pandas as pd

st.markdown('<style>h1{color: red;}</style>', unsafe_allow_html=True)

st.title('Find the gift product based on Friend Interest')

st.write("Hi there! :wave: If you have a product you currently like, I can help you find a similar one. :point_up:")
st.write('Please choose a product content feature below so I can recommend similar ones :smile:')
st.write('The dataset contains products from Amazon :star2:, but unfortunately, it is possible that it does not have the product you are looking for :disappointed:')

# Load the data (Make sure 'amazon_category.csv' contains the 'Image' column)

df = pd.read_csv('amazon_categoryv6.csv')

# Choose a product category

category = st.selectbox(label='What is Your Friend Interest ?', options=df['Sub-Category'].unique())

category_subset = df[df['Sub-Category'] == category]

# Choose a sub category

brand = st.selectbox(label='What, in your opinion, would be a suitable product as a gift?', options=sorted(map(str, category_subset['Side Category'].unique())))

category_brand_subset = category_subset[category_subset['Side Category'] == brand]

# Choose a side category

side = st.selectbox(label='What kind of gift do you believe would be most suitable for the occasion?', options=sorted(category_brand_subset['More Categories'].unique()))

category_side_subset = category_brand_subset[category_subset['More Categories'] == side]

# Add a submit button to display recommendations
show_recommendations = st.button("Submit")
if show_recommendations:
    product_info = category_side_subset[['Product Name', 'Selling Price', 'Image', 'Product Url']].drop_duplicates()

    st.write(f'Here are recommended products based on the selected Interest and characteristics:')
    
    for _, row in product_info.iterrows():
        st.markdown(f"<h3>{row['Product Name']}</h3>", unsafe_allow_html=True)
        st.markdown(f"<h4 style='font-size: 20px;'>Price: {row['Selling Price']}</h4>", unsafe_allow_html=True)
        st.image(row['Image'], caption=row['Product Name'], width=200)
        st.write("URL:", row['Product Url'])
        st.write("---")
